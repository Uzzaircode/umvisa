<?php
namespace App\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\Notification;
use Auth;

class NotificationsRepository extends AbstractRepository implements NotificationRepoInterface
{
    protected $modelClassName = 'App\Notification';

    public static function allNotifications(){
        return Notification::where('receiver_id','=',Auth::id())->orderBy('created_at','desc')->take(3)->get();
    }

    public function createNew($user_id,$ticket_id,$receiver_id)
    {
        return $this->modelClassName::create([
            'user_id' => $user_id,
            'ticket_id'=> $ticket_id,
            'read_status'=> 0,
            'receiver_id' => $receiver_id,
            'action_id' => 1
        ]);
    }

    public function approveNotification($user_id,$ticket_id,$receiver_id)
    {
        return $this->modelClassName::create([
            'user_id' => $user_id,
            'ticket_id'=> $ticket_id,
            'read_status'=> 0,
            'receiver_id' => $receiver_id,
            'action_id' => 2
        ]);
    }

    public function rejectNotification($user_id,$ticket_id,$receiver_id)
    {
        return $this->modelClassName::create([
            'user_id' => $user_id,
            'ticket_id'=> $ticket_id,
            'read_status'=> 0,
            'receiver_id' => $receiver_id,
            'action_id' => 3
        ]);
    }
}