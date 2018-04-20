<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketAttachment extends Model
{
    protected $fillable = ['path','ticket_id'];

    public function ticket(){
        $this->belongsTo(Ticket::class);
    }
}
