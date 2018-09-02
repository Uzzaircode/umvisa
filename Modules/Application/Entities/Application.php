<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\ModelStatus\HasStatuses;
use BrianFaust\Commentable\Traits\HasComments;
use Auth;
use Carbon\Carbon;

class Application extends Model
{
    use HasStatuses;
    use HasComments;

    protected $table = 'applications';

    protected $fillable = ['user_id','title','venue','description','state','country','event_start_date', 'event_end_date','travel_start_date','travel_end_date','alternate_email','type'];

    protected $dates = ['event_start_date', 'event_end_date','travel_start_date','travel_end_date'];

    
    public function applicationAttachments()
    {
        return $this->hasMany(ApplicationAttachment::class);
    }

    public function participants(){
        return $this->hasMany(Participant::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function financialaids(){
        return $this->hasMany(FinancialAid::class);
    }

    public function setEventStartDateAttribute($value){
        $this->attributes['event_start_date'] = Carbon::createFromFormat(config('app.date_format'),$value)->format('Y-m-d');
    }
    public function getEventStartDateAttribute($value){
        return Carbon::createFromFormat('Y-m-d',$value)->format(config('app.date_format'));
    }
    public function setEventEndDateAttribute($value){
        $this->attributes['event_end_date'] = Carbon::createFromFormat(config('app.date_format'),$value)->format('Y-m-d');
    }
    public function getEventEndDateAttribute($value){
        return Carbon::createFromFormat('Y-m-d',$value)->format(config('app.date_format'));
    }


    public function setTravelStartDateAttribute($value){
        $this->attributes['travel_start_date'] = Carbon::createFromFormat(config('app.date_format'),$value)->format('Y-m-d');
    }
    public function getTravelStartDateAttribute($value){
        return Carbon::createFromFormat('Y-m-d',$value)->format(config('app.date_format'));
    }
    public function setTravelEndDateAttribute($value){
        $this->attributes['travel_end_date'] = Carbon::createFromFormat(config('app.date_format'),$value)->format('Y-m-d');
    }
    public function getTravelEndDateAttribute($value){
        return Carbon::createFromFormat('Y-m-d',$value)->format(config('app.date_format'));
    }
    
    
    
    public function scopeUserApplication($query)
    {
        if (Auth::user()->hasRole('User')) {
            return $query->where('user_id', Auth::id());
        }
        
        if (Auth::user()->hasRole('Supervisor')) {
            return $query->whereHas('user', function ($q) {
                $q->whereHas('profile', function ($p) {
                    $p->where('supervisor_id', Auth::id());
                });
            })->whereHas('statuses', function ($s) {
                $s->where('name', 'Submitted To Supervisor');
            });
        }
        
        if (Auth::user()->hasRole('Deputy Dean')) {
            return $query->whereHas('statuses', function ($s) {
                $s->where('name', 'Submitted To Deputy Dean');
            });
        }
    }
}
