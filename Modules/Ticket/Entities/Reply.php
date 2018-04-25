<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ticket\Entities\Ticket;
use App\User;
class Reply extends Model
{
    protected $fillable = ['body','user_id','ticket_id'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
