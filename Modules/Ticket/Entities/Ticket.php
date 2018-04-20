<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sap\Entities\Sap;
use Modules\Ticket\Entities\TicketAttachment;
use App\User;

class Ticket extends Model
{
    protected $fillable = ['subject', 'body', 'sap_id', 'user_id','ticket_type'];

    public function sap(){
        return $this->belongsTo(Sap::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attachments(){
        return $this->hasMany(TicketAttachment::class);
    }

}
