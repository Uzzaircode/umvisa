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

    protected $fillable = ['user_id','title','venue','country','start_date','end_date','financial_aid','account_no_ref','sponsor_name','other_remarks'];

    protected $dates = ['start_date', 'end_date'];

    public function applicationAttachments(){
        return $this->hasMany(ApplicationAttachment::class);
    }

    public function scopeUserApplication($query){
        
        if($this->isUser()){
            return $query->where('user_id',Auth::id());
        }
    }

    public function isAdmin(){
        return Auth::user()->hasRole('Admin');
    }

    public function isUser(){
        return Auth::user()->hasRole('User');
    }
    
}
