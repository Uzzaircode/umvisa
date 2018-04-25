<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sap\Entities\Sap;
use Modules\Department\Entities\Department;
use Modules\Ticket\Entities\TicketAttachment;
use Modules\Application\Entities\Application;
use Modules\Ticket\Entities\Reply;
use App\User;

class Ticket extends Model
{
    protected $fillable = ['subject', 'body', 'sap_id', 'user_id','dept_id','ticket_type','integration','application_id','ticket_number','status'];

    public function sap(){
        return $this->belongsTo(Sap::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function attachments(){
        return $this->hasMany(TicketAttachment::class);
    }

    public function application(){
        return $this->belongsTo(Application::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

}
