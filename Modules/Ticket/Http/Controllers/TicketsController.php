<?php

namespace Modules\Ticket\Http\Controllers;

use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;
use App\Profile;
use App\User;
use Auth;
use App\Notification;
use Modules\Ticket\Http\Requests\CreateReplies as CR;
use App\Notifications\TicketSubmitted as NTS;
use Modules\Ticket\Http\Requests\CreateTicketRequest as CTR;
use Modules\Ticket\Repositories\TicketsRepository as TR;
use Modules\Ticket\Repositories\TicketsAttachmentRepository as TAR;
use Modules\Ticket\Repositories\RepliesRepository as RR;
use App\Repositories\UsersRepository as UR;
use Modules\Ticket\Entities\TicketStatus as TS;
use Modules\Ticket\Entities\TicketsStatusArray as TSA;
use Session;
use App\Notifications\TicketSubmitted;
use App\Notifications\TicketApproved;
use App\Notifications\TicketRejected;
use App\Notifications\TicketAssigned;

/**
 * Status Codes
 * 1  = Draft - yellow
 * 2  = Submitted to HOD - green
 * 3  = Approved by HOD - blue
 * 4  = Rejected by HOD - red
 * 5  = Submitted to Dasar - green
 * 6  = Approved by Dasar - blue
 * 7  = Rejected by Dasar - red
 * 8  = Submitted to PTM - green
 * 9  = Approved by PTM - blue
 * 10 = Rejected by PTM -red
 */

/**
 * Buttons
 * 1. approve_hod = Approve by HOD
 *  2. reject_hod  = Reject by HOD
 *  3. approve_dasar = Approve by Dasar
 *  4. reject_dasar = Reject by Dasar
 *  5. approve_ptm = Approve by PTM
 *  6. reject_ptm = Reject by PTM
 */

class TicketsController extends Controller
{
    use Authorizable;
    
    public function __construct(UR $users, TR $tickets, Auth $auth, TAR $ticketsAttachment, TSA $ticketStatusArray, NTS $notifications, TS $ticketStatus, RR $replies, Profile $profile)
    {
        $this->entity = 'ticket';
        $this->users = $users;
        $this->tickets = $tickets;       
        $this->auth = $auth;
        $this->ticketsAttachment = $ticketsAttachment;
        $this->ticketStatusArray = $ticketStatusArray;
        $this->ticketStatus = $ticketStatus;
        $this->notifications = $notifications;
        $this->replies = $replies;
        $this->profile = $profile;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('ticket::index', ['results'=> $this->tickets->allTickets()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $users = $this->users->pluck('name', 'id');        
        $apps = $this->apps->all();
        $user_tickets = $this->auth::user()->tickets;
        if ($this->tickets->count() < 0) {
            $ticket_rn = 001;
        } else {
            $ticket_rn = $this->tickets->ticketNumber();
        }
        return view('ticket::form', compact('users','apps', 'user_tickets', 'ticket_rn'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $ticket = $this->tickets->find($id);       
        $apps = $this->apps->all();
        $user_tickets = Auth::user()->tickets;
        $ticket_rn = $this->tickets->ticketNumber();
        $replies = $ticket->replies->sortByDesc('created_at');
        $status = $ticket->status;
        $date_arr = $this->ticketStatusArray->createDateArray($ticket);
        $it_persons = User::role('Brillante')->get();
        usort($date_arr, array($this, "date_sort"));

        return view('ticket::show', compact('users','apps', 'user_tickets', 'ticket_rn', 'ticket', 'replies', 'status', 'date_arr','it_persons'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CTR $request, AppMailer $mailer)
    {
        // fetch all requests except for ticket number
        $ticket = $this->tickets->create($request->except('ticket_number'));       
        // then find SAP Code
        $sap_code = "Hello";
        // fetch ticket number
        $ticket_rn = $request->ticket_number;
        // save ticket number into database
        $ticket->ticket_number = $this->tickets->ticketNumberFormat($sap_code, $ticket_rn);
        // Auth user
        $user = $this->auth::user();
        // if user upload attachement
        if ($request->hasFile('files')) {
            // $repo->uploadFiles(['files'], $ticket);
            foreach ($request->file('files') as $file) {
                // save the attachment with ticket number and time as prefix
                $filename = $ticket->ticket_number . '-' . time() . $file->getClientOriginalName();
                // move the attachement to public/uploads/attachments folder
                $file->move('uploads/attachments', $filename);
                // create attachement record in database, attach it to Ticket ID
                $this->ticketsAttachment->create([
                    'ticket_id'=>$ticket->id,
                    'path'=>'uploads/attachments/'.$filename
                    ]);
            }
        }
        //if the user leaves a remark
        if (!empty($request->replybody)) {
            // create reply record in database, attach it to Ticket ID and Current User ID
            $this->replies->create([
                'body' => $request->replybody,
                'ticket_id' => $ticket->id,
                'user_id' => Auth::id(),
            ]);
        }
        $ticket->save();
        // if the user save the ticket as draft
        if ($request->has('draft')) {
            $ticket->status = $this->ticketStatus::DRAFT;
            $ticket->save();
            Session::flash('success', 'The ' . $this->entity . ' has been created successfully');
        }
        //if the user submit the ticket. The ticket will be submitted to HOD
        if ($request->has('submit_hod')) {
            // trigger submitToHOD listener
            $ticket->status = $this->ticketStatus::SUBMITTED_TO_HOD;
            $ticket->submitted_hod_date = time();           
            $ticket->save();
            // Find HOD based on Dept ID
            $dept_id = $request->dept_id;
            $receiver_id = $this->profile::where('hod_id', $dept_id)->first()->user_id;            
            $this->users->find($receiver_id)->notify(new TicketSubmitted($ticket,Auth::user()));
            Session::flash('success', 'The ' . $this->entity . ' has been created successfully');
        }

        
        return redirect()->route('tickets.index');
    }

    
    

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $ticket = $this->tickets->find($id);
        $saps = $this->saps->pluck('name', 'id');
        $sap_users = $this->auth::user()->saps;
        $depts = $this->auth::user()->departments;
        $apps = $this->apps->all();
        $user_tickets = $this->auth::user()->tickets;
        $ticket_rn = $this->tickets->ticketNumber();
        $replies = $ticket->replies->sortByDesc('created_at');

        return view('ticket::form', compact('users', 'saps', 'depts', 'sap_users', 'apps', 'user_tickets', 'ticket_rn', 'ticket', 'replies'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($id, CTR $request)
    {
        // find ticket
        $ticket = $this->tickets->find($id);        
        $dept_id = $request->dept_id;
        $receiver_id = $this->profile::where('hod_id', $dept_id)->first()->user_id;
        $ticket_id = $ticket->id;
        $user = $this->auth::user();
        // accept all requests
        $ticket->update($request->all());
        // if user upload attachments
        if ($request->hasFile('files')) {
            if (isset($ticket)) {
                foreach ($request->file('files') as $file) {
                    $filename = $ticket->ticket_number . '-' . time() . $file->getClientOriginalName();
                    $file->move('uploads/attachments', $filename);
                    $this->ticketsAttachment->create([
                        'ticket_id'=>$ticket->id,
                        'path'=>'uploads/attachments/'.$filename
                        ]);
                }
            }
        }
        //if the user leaves a remark
        if (!empty($request->replybody)) {
            $reply = $this->replies->create([
                'body' => $request->replybody,
                'ticket_id' => $id,
                'user_id' => $this->auth::user()->id,
            ]);
        }
        // if the user save the ticket as draft
        if ($request->has('draft')) {
            $this->tickets->draft($ticket);
            Session::flash('success', 'The ' . $this->entity . ' has been updated successfully');
            return redirect()->back();
        }
        // if the user submit the ticket
        if ($request->has('submit_hod')) {
            $this->tickets->submit_to_hod($ticket);
            $this->users->find($receiver_id)->notify(new TicketSubmitted($ticket,$user));
            Session::flash('success', 'The ' . $this->entity . ' has been submitted to HOD successfully');
            return redirect()->route('tickets.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $this->tickets->find($id)->delete();
        Session::flash('success', 'The ' . $this->entity . ' has been deleted successfully');
        return redirect()->back();
    }

    public function approve(CR $request, $id, AppMailer $mailer)
    {
        $ticket = $this->tickets->find($id);        
        $user = $this->auth::user();
        $ticket_id = $ticket->id;
        $dasar_id = User::role('Dasar')->get()->first()->id;
        $ptm_id = User::role('PTM')->get()->first()->id;
        

        // replies are always created, can't be edited or deleted. Exception for Admin
        if (!empty($request->replybody) && $request->has('replybody')) {
            $this->replies->create([
            'body' => $request->replybody,
            'ticket_id' => $ticket->id,
            'user_id' => $this->auth::id(),
        ]);
        }        
        // if HOD has approved the ticket
        if ($request->has('approve_hod')) {
            $this->tickets->approve_hod($ticket);
            //notify ticket owner aka user
            $this->users->find($ticket->user->id)->notify(new TicketApproved($ticket,$user));
            //notify Dasar
            $this->users->find($dasar_id)->notify(new TicketSubmitted($ticket,$user));
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been approved');
        } // if HOD has rejected the ticket
        if ($request->has('reject_hod')) {
            $this->tickets->reject_hod($ticket);
            $this->users->find($ticket->user->id)->notify(new TicketRejected($ticket,$user));       
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been rejected');
        } // if HOD submit to Dasar
        if ($request->has('submit_to_dasar')) {
            $this->tickets->submit_to_dasar($ticket);
            $this->users->find($dasar_id)->notify(new TicketSubmitted($ticket,$user));            
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been submitted to Dasar');
        } // if Dasar has approved the ticket
        if ($request->has('approve_dasar')) {
            $this->tickets->approve_dasar($ticket);
            $this->users->find($ticket->user->id)->notify(new TicketApproved($ticket,$user));
            $this->users->find($ptm_id)->notify(new TicketSubmitted($ticket,$user));
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been approved');
        } // if Dasar has rejected the ticket
        if ($request->has('reject_dasar')) {
            $this->tickets->reject_dasar($ticket);
            $this->users->find($ticket->user->id)->notify(new TicketRejected($ticket,$user)); 
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been rejected');
        } // if PTM has approved the ticket
        if ($request->has('submit_to_ptm')) {
            $this->tickets->submit_to_ptm($ticket);
            $this->users->find($dasar_id)->notify(new TicketSubmitted($ticket,$user));
            $mailer->sendTicketInformation(Auth::user(), $ticket);
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been submitted to PTM');
        }
        if ($request->has('approve_ptm')) {
            $this->tickets->approve_ptm($ticket);
            $this->users->find($ticket->user->id)->notify(new TicketApproved($ticket,$user));
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been approved');
        } // if PTM has rejected the ticket
        if ($request->has('reject_ptm')) {
            $this->tickets->reject_ptm($ticket);
            $this->users->find($ticket->user->id)->notify(new TicketRejected($ticket,$user));
            Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been rejected');
        } 
        if($request->has('assign_ticket')){
            $it_person_id = $request->it_person_id;
            $this->tickets->assign_ticket($ticket);
            $this->users->find($it_person_id)->notify(new TicketAssigned($ticket,$user));        Session::flash('success', 'The ticket ' . $ticket->ticket_number . ' has been assigned to '. $this->users->find($it_person_id)->name);   
        }
        // if a reply has been submitted
        if ($request->has('comment')) {
            Session::flash('success', 'Your comment has been submitted');
        }
        return redirect()->back();
    }

    public function markread(Request $request, $id,$ticket_id)
    {
        $notification = Notification::find($id);
        $ticket = $this->tickets->find($ticket_id);
        if ($request->has('readby_hod')) {
            $this->tickets->readby_hod($ticket);
            $this->auth::user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        if ($request->has('readby_dasar')) {
            $this->tickets->readby_dasar($ticket);
            $this->auth::user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        if ($request->has('readby_ptm')) {
            $this->tickets->readby_dasar($ticket);
            $this->auth::user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        if ($request->has('readby_user')) {            
            $this->auth::user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        if ($request->has('readby_it')) {            
            $this->auth::user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        return redirect()->route('tickets.show', ['id' => $ticket->id]);
    }

    public function read(Request $request, $id)
    {        
        $ticket = $this->tickets->find($id);
        if ($request->has('readby_hod')) {
            $this->tickets->readby_hod($ticket);            
        }
        if ($request->has('readby_dasar')) {
            $this->tickets->readby_dasar($ticket);            
        }
        if ($request->has('readby_ptm')) {
            $this->tickets->readby_ptm($ticket);           
        }
        return redirect()->route('tickets.show', ['id' => $ticket->id]);
    }

    public function date_sort($a, $b)
    {
        return strtotime($a['timestamp']) - strtotime($b['timestamp']);
    }
}
