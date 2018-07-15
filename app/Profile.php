<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\Department\Entities\Department;
use App\User;

class Profile extends Model
{
    protected $fillable = ['user_id','avatar','hod_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class,'hod_id');
    }

    public function supervisor(){
        return $this->belongsTo(User::class,'supervisor_id');
    }
}
