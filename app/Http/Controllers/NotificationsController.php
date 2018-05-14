<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationsController extends Controller
{
    
    public function index(){
        $results = Notification::where('receiver_id','=',Auth::id())->orderBy('created_at','desc')->get();
        return view('backend.notifications.index',compact('results'));
    }
}
