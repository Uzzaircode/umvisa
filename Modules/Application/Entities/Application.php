<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\ModelStatus\HasStatuses;
use BrianFaust\Commentable\Traits\HasComments;


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

    
}
