<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\Ticket\Entities\Ticket;
use App\User;

class Notification extends Model
{
    protected $fillable = ['ticket_id','user_id','read_status','receiver_id','action_id'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
