<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketAttachment extends Model
{
    protected $fillable = ['path','ticket_id'];

    protected $table = 't_attachments';
    
    public function ticket(){
        $this->belongsTo(Ticket::class);
    }
}
