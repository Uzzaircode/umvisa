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
        // dd($request->replybody);
        $ticket = $repo->create($request->except('ticket_number'));
        $sap_id = $request->sap_id;
        $sap_code = Sap::find($sap_id)->code;
        $ticket_rn = $request->ticket_number;
        $ticket->ticket_number = 'UM' . date('Y') . '-' . $sap_code . '-' . $ticket_rn;                
        // if there is attachment
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $ticket->ticket_number. '-' . time() . $file->getClientOriginalName();
                $file->move('uploads/attachments', $filename);
                TicketAttachment::create([
                    'ticket_id' => $ticket->id,
                    'path' => 'uploads/attachments/' . $filename,
                ]);
            }
        }        
        //if the user leaves a remark
        if(!empty($request->replybody)){
          Reply::create([
                'body' => $request->replybody,
                'ticket_id' => $ticket->id,
                'user_id' => Auth::id()
            ]);           
        }
        if($request->has('draft')){
            $ticket->status = 1;
            $ticket->touch();
            $ticket->save();
            Session::flash('success', 'The ' . $this->entity . ' has been created successfully');
        }
        
        if($request->has('publish')){
            $ticket->status = 2;            
            $ticket->touch();
            $mailer->sendTicketInformation(Auth::user(), $ticket);
            $ticket->save();
            Session::flash('success', 'The ' . $this->entity . ' has been created successfully');
        }
        // $ticket->touch();
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
        $ticket = $repo->find($id);
        $ticket->update($request->all());
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
        if($request->has('draft')){
            $ticket->status = 1;
            $ticket->touch();
            $ticket->save();
        }        
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
        Reply::create([
            'body' => $request->replybody,
            'ticket_id'=>$ticket->id,
            'user_id' => Auth::id()
        ]);        
        if($request->has('approve')){            
            $repo->approve($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been approved');
        }elseif($request->has('reject')){
            $repo->reject($ticket);
            Session::flash('success','The ticket '.$ticket->ticket_number.' has been rejected');
        }elseif($request->has('comment')){
            Session::flash('success','Your comment has been submitted');  
        }          
        return redirect()->back();
    }
}
