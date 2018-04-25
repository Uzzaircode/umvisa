<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ticket\Entities\Ticket;

class Reply extends Model
{
    protected $fillable = ['remarks','user_id','ticket_id)'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
