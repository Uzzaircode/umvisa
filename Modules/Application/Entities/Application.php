<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\ModelStatus\HasStatuses;
use BrianFaust\Commentable\Traits\HasComments;
use Auth;

class Application extends Model
{
    use HasStatuses;
    use HasComments;

    protected $table = 'applications';

    protected $fillable = ['user_id','title','venue','country','start_date','end_date','financial_aid','account_no_ref','sponsor_name','others_remarks'];

    protected $dates = ['start_date', 'end_date'];

    public function applicationAttachments()
    {
        return $this->hasMany(ApplicationAttachment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
