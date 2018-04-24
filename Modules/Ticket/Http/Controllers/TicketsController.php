<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Authorizable;
use Session;
use Illuminate\Support\Facades\Auth;
use Modules\Sap\Entities\Sap;
use Modules\Department\Entities\Department;
use App\User;
use Modules\Ticket\Repositories\TicketsRepository as TR;
use Modules\Ticket\Http\Requests\CreateTicketRequest as CTR;
use Modules\Ticket\Entities\TicketAttachment;
use Modules\Ticket\Entities\Ticket;
use Modules\Application\Entities\Application;

class TicketsController extends Controller
{
    use Authorizable;

    private $entity;
    protected $model;

    public function __construct(){
        $this->entity = 'ticket';                     
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(TR $repo)
    {
        $results = $repo->allTickets();        
        return view('ticket::index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(TR $repo)
    {           
        $users = User::pluck('name','id');
        $saps = Sap::pluck('name','id');
        $sap_users = Auth::user()->saps;
        $depts = Department::all();
        $apps = Application::all();
        $user_tickets = Auth::user()->tickets;        
        $ticket_rn =  $repo->ticketNumber();
        return view('ticket::form',compact('users','saps','depts','sap_users','apps','user_tickets','ticket_rn'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(TR $repo, CTR $request)
    {
        $ticket = $repo->create($request->all());
        if($request->hasFile('files')){
        foreach($request->file('files') as $file){
            $filename = trim(Auth::user()->name). time() . $file->getClientOriginalName();
            $file->move('uploads/attachments', $filename);
            TicketAttachment::create([
                'ticket_id' => $ticket->id,
                'path' => 'uploads/attachments/'.$filename
            ]);
        }
    }
        Session::flash('success', 'The '.$this->entity.' has been created successfully');
        return redirect()->route('tickets.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('ticket::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(TR $repo,$id)
    {   
        $ticket = $repo->find($id);        
        $saps = Sap::pluck('name', 'id');
        $sap_users = Auth::user()->saps;
        $depts = Department::all();
        $apps = Application::all(); 
        $user_tickets = Auth::user()->tickets;
        $ticket_rn =  $repo->ticketNumber();
        return view('ticket::form',compact('users','saps','depts','sap_users','apps','user_tickets','ticket_rn','ticket'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(TR $repo,CTR $request,$id)
    {
        $ticket = $repo->find($id);
        $ticket->update($request->all());
        if($request->hasFile('files')){
        foreach($request->file('files') as $file){
            $filename = trim(Auth::user()->name). time() . $file->getClientOriginalName();
            $file->move('uploads/attachments', $filename);
            TicketAttachment::update([
                'ticket_id' => $ticket->id,
                'path' => 'uploads/attachments/'.$filename
            ]);
        }
    }
        Session::flash('success','The '.$this->entity.' has been updated successfully');
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
        Session::flash('success','The '.$this->entity.' has been deleted successfully');
        return redirect()->back();
    }
}
