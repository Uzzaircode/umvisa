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
    public function store(TR $repo, CTR $request)
    {
        // dd($request->replybody);
        $ticket = $repo->create($request->all());
        $sap_id = $request->sap_id;
        $sap_code = Sap::find($sap_id)->code;
        $tn = $request->ticket_number;
        $ticket->ticket_number = 'UM' . date('Y') . '-' . $sap_code . '-' . $tn;
        
        // if there is attachment
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = trim(Auth::user()->name) . time() . $file->getClientOriginalName();
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
            $ticket->save();
        }
        
        if($request->has('publish')){
            $ticket->status = 2;
            $ticket->save();
        }
        $ticket->save();
        Session::flash('success', 'The ' . $this->entity . ' has been created successfully');
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
        $replies = $ticket->replies();
        return view('ticket::show', compact('users', 'saps', 'depts', 'sap_users', 'apps', 'user_tickets', 'ticket_rn', 'ticket','replies'));
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
        $replies = $ticket->replies;
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
            foreach ($request->file('files') as $file) {
                $filename = trim(Auth::user()->name) . time() . $file->getClientOriginalName();
                $file->move('uploads/attachments', $filename);
                TicketAttachment::update([
                    'ticket_id' => $ticket->id,
                    'path' => 'uploads/attachments/' . $filename,
                ]);
            }
        }
        //if the user leaves a remark
        if($request->has('replybody') && !empty($request->replybody)){
            Reply::create([
                'body' => $request->replybody,
                'ticket_id' => $id,
                'user_id' => Auth::id()
            ]);                                          
        }
        if($request->has('draft')){
            $ticket->status = 1;
            $ticket->save();
        }        
        if($request->has('publish')){
            $ticket->status = 2;
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
}
