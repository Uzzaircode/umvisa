<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Authorizable;
use Session;
use Illuminate\Support\Facades\Auth;
use Modules\Sap\Entities\Sap;
use App\User;
use Modules\Ticket\Repositories\TicketsRepository as TR;

class TicketsController extends Controller
{
    use Authorizable;

    private $entity;
    protected $model;

    public function __construct(){
        $this->entity = 'Ticket';                     
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('ticket::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {   
        $users = User::pluck('name','id');
        $saps = Sap::pluck('name','id');
        return view('ticket::form',compact('users','saps'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(TR $repo, Request $request)
    {
        $repo->create($request->all());
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
    public function edit()
    {
        return view('ticket::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
