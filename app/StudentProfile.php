<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class StudentProfile extends Model
{
    protected $table = 'view_profile_education';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
