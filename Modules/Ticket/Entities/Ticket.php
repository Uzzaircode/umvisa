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
    protected $dates = ['submitted_hod_date','approved_hod_date','rejected_hod_date','submitted_dasar_date','approved_dasar_date','rejected_dasar_date','submitted_ptm_date','approved_ptm_date','rejected_ptm_date'];
    
    public function sap(){
        return $this->belongsTo(Sap::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class,'dept_id');
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

    public function assigned_to(){
        return $this->belongsTo(User::class,'assigned_to');
    }
}
