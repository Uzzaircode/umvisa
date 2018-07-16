<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
use Illuminate\Support\Facades\URL;
use Modules\Application\Repositories\ApplicationRepository;

class NotificationsController extends Controller
{
    public function __construct(ApplicationRepository $app)
    {
        $this->app = $app;
    }
    
    public function index()
    {
        $results = Notification::where('receiver_id', '=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('backend.notifications.index', compact('results'));
    }

    public function markAsRead($id, $application_id)
    {
        Auth::user()->notifications->find($id)->markAsRead();
        
        if (isset($application_id)) {
            $app = $this->app->find($application_id);
            $app->setStatus('Read', 'Read by '.Auth::user()->name);
            $signedUrl = URL::signedRoute('applications.show', ['id'=> $application_id]);
            return redirect($signedUrl);
        }
    }
}
