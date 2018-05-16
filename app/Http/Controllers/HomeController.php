<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Ticket\Repositories\TicketsRepository as TR;
use App\Repositories\UsersRepository as UR;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TR $trepo, UR $urepo)
    {   
        // $tickets = $trepo->allTickets();            
        return redirect()->route('tickets.index');
    }
}
