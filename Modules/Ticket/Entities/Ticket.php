<?php

namespace Modules\Ticket\Entities;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Ticket\Entities\Reply;
use Modules\Ticket\Entities\TicketAttachment;
use App\Notification;

class Ticket extends Model
{

    protected $fillable = ['subject', 'body','user_id','ticket_type', 'integration', 'application_id', 'ticket_number', 'status'];
    protected $dates = ['submitted_hod_date', 'approved_hod_date', 'rejected_hod_date', 'submitted_dasar_date', 'approved_dasar_date', 'rejected_dasar_date', 'submitted_ptm_date', 'approved_ptm_date', 'rejected_ptm_date', 'readby_hod_date', 'readby_dasar_date', 'readby_ptm_date','assigned_date'];

    public function sap()
    {
        return $this->belongsTo(Sap::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    public function attachments()
    {
        return $this->hasMany(TicketAttachment::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // Dates Accessors
    // public function getCreatedAtAttribute($value)
    // {
    //     if ($value != null) {
    //         return Carbon::parse($value)->toDayDateTimeString();
    //     }
    // }
    public function getReadbyHodDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getSubmittedHodDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getApprovedHodDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getRejectedHodDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getReadbyDasarDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getSubmittedDasarDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getApprovedDasarDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getRejectedDasarDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getReadbyPtmDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getSubmittedPtmDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getApprovedPtmDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    public function getRejectedPtmDateAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->toDayDateTimeString();
        }
    }
    

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

}
