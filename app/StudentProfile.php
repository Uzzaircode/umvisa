<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class StudentProfile extends Model
{
    protected $table = 'user_student';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
