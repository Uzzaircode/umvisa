<?php

namespace Modules\Ticket\Http\Controllers;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Application\Entities\Application;
use Modules\Department\Entities\Department;
use Modules\Sap\Entities\Sap;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Entities\TicketAttachment;
use Modules\Ticket\Http\Requests\CreateTicketRequest as CTR;
use Modules\Ticket\Repositories\TicketsRepository as TR;
use Modules\Ticket\Entities\Reply;
use Modules\Ticket\Http\Requests\CreateReplies as CR;
use App\Mailers\AppMailer;
use Session;

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

    private $entity;
    protected $model;

    public function __construct()
    {
        $this->entity = 'ticket';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(TR $repo)
    {
        $results = $repo->allTickets();
        return view('ticket::index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(TR $repo)
    {
        $users = User::pluck('name', 'id');
        $saps = Sap::pluck('name', 'id');
        $sap_users = Auth::user()->saps;
        $depts = Auth::user()->departments;
        $apps = Application::all();
        $user_tickets = Auth::user()->tickets;
        $ticket_rn = $repo->ticketNumber();
        return view('ticket::form', compact('users', 'saps', 'depts', 'sap_users', 'apps', 'user_tickets', 'ticket_rn'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(TR $repo, CTR $request, AppMailer $mailer)
    {
        // fetch all requests except for ticket number
        $ticket = $repo->create($request->except('ticket_number'));
        // fetch SAP ID
        $sap_id = $request->sap_id;
        // then find SAP Code
        $sap_code = Sap::find($sap_id)->code;
        // fetch ticket number
        $ticket_rn = $request->ticket_number;
        // save ticket number into database
        $ticket->ticket_number = 'UM' . date('Y') . '-' . $sap_code . '-' . $ticket_rn;                
        // if user upload attachement
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // save the attachment with ticket number and time as prefix
                $filename = $ticket->ticket_number. '-' . time() . $file->getClientOriginalName();
                // move the attachement to public/uploads/attachments folder
                $file->move('uploads/attachments', $filename);
                // create attachement record in database, attach it to Ticket ID
                TicketAttachment::create([
                    'ticket_id' => $ticket->id,
                    'path' => 'uploads/attachments/' . $filename,
                ]);
            }
        }        
        //if the user leaves a remark
        if(!empty($request->replybody)){
          // create reply record in database, attach it to Ticket ID and Current User ID
          Reply::create([
                'body' => $request->replybody,
                'ticket_id' => $ticket->id,
                'user_id' => Auth::id()
            ]);           
        }
        // if the user save the ticket as draft
        if($request->has('draft')){
            $ticket->status = 1;
            $ticket->touch();
            $ticket->save();
            Session::flash('success', 'The ' . $this->entity . ' has been created successfully');
        }        
        //if the user submit the ticket. The ticket will be submitted to HOD
        if($request->has('submit_hod')){
            $ticket->status = 2;            
            $ticket->touch();
            // send email to respective HOD, with Current User object and Ticket Information as parameters
            $mailer->sendTicketInformation(Auth::user(), $ticket);
            $ticket->save();
            Session::flash('success', 'The ' . $this->entity . ' has been created successfully');
        }
        $ticket->save();        
        return redirect()->route('tickets.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(TR $repo, $id)
    {

        $ticket = $repo->find($id);
        $saps = Sap::pluck('name', 'id');
        $sap_users = Auth::user()->saps;
        $depts = Department::all();
        $apps = Application::all();
        $user_tickets = Auth::user()->tickets;
        $ticket_rn = $repo->ticketNumber();
        $replies = $ticket->replies->sortByDesc('created_at');
        $status = $ticket->status;
        return view('ticket::show', compact('users', 'saps', 'depts', 'sap_users', 'apps', 'user_tickets', 'ticket_rn', 'ticket','replies','status'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(TR $repo, $id)
    {
        $ticket = $repo->find($id);
        $saps = Sap::pluck('name', 'id');
        $sap_users = Auth::user()->saps;
        $depts = Department::all();
        $apps = Application::all();
        $user_tickets = Auth::user()->tickets;
        $ticket_rn = $repo->ticketNumber();
        $replies = $ticket->replies->sortByDesc('created_at');
        return view('ticket::form', compact('users', 'saps', 'depts', 'sap_users', 'apps', 'user_tickets', 'ticket_rn', 'ticket','replies'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(TR $repo, CTR $request, $id)
    {   
        // find ticket
        $ticket = $repo->find($id);
        // accept all requests
        $ticket->update($request->all());
        // if user upload attachments
        if ($request->hasFile('files')) {
            if (isset($ticket)){
            foreach ($request->file('files') as $file) {
                $$filename = $ticket->ticket_number. '-' . time() . $file->getClientOriginalName();;
                $file->move('uploads/attachments', $filename);
                $ticket->attachments->ticket_id = $ticket->id;
                $ticket->attachments->path = 'uploads/attachments'.$filename;
                $ticket->attachments->save();                                    
            }
        }
        }
        //if the user leaves a remark
        if($request->has('replybody') && !empty($request->replybody)){
            $reply = Reply::create([
                'body' => $request->replybody,
                'ticket_id' => $id,
                'user_id' => Auth::id()
            ]);
            $reply->touch();                                         
        }
        // if the user save the ticket as draft
        if($request->has('draft')){
            $ticket->status = 1;
            $ticket->touch();
            $ticket->save();
        }
        // if the user submit the ticket      
        if($request->has('publish')){
            $ticket->status = 2;
            $ticket->touch();
            $ticket->save();
        }
        Session::flash('success', 'The ' . $this->entity . ' has been updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(TR $repo, Request $request, $id)
    {
        $ticket = $repo->find($id);
        $ticket->delete();
        Session::flash('success', 'The ' . $this->entity . ' has been deleted successfully');
        return redirect()->back();
    }

    public function approve(CR $request, TR $repo, $id){
        $ticket = $repo->find($id);
        // replies are always created, cant be edited or deleted. Exception for Admin
        Reply::create([
            'body' => $request->replybody,
            'ticket_id'=>$ticket->id,
            'user_id' => Auth::id()
        ]);
        // if HOD has approved the ticket
        if($request->has('approve_hod')){            
            $repo->approve_hod($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been approved');
        }// if HOD has rejected the ticket
        elseif($request->has('reject_hod')){
            $repo->reject_hod($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been rejected');
        }// if Dasar has approved the ticket
        elseif($request->has('approve_dasar')){
            $repo->approve_dasar($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been rejected');
        }// if Dasar has rejected the ticket
        elseif($request->has('reject_dasar')){
            $repo->reject_dasar($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been rejected');
        }// if PTM has approved the ticket
        elseif($request->has('approve_ptm')){
            $repo->approve_ptm($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been rejected');
        }// if PTM has rejected the ticket
        elseif($request->has('reject_ptm')){
            $repo->reject_ptm($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been rejected');
        }// if a reply has been submitted
        elseif($request->has('comment')){
            Session::flash('success','Your comment has been submitted');  
        }          
        return redirect()->back();
    }
}
