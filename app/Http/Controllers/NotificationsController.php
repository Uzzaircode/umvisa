<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
use Illuminate\Support\Facades\URL;

class NotificationsController extends Controller
{
    public function index()
    {
        $results = Notification::where('receiver_id', '=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('backend.notifications.index', compact('results'));
    }

    public function markAsRead($id,$application_id)
    {
        Auth::user()->notifications->find($id)->markAsRead();
        if(isset($application_id)){
            $signedUrl = URL::signedRoute('applications.edit',['id'=> $application_id]);
            return redirect($signedUrl);
        }
        
        
    }
}
