<?php

namespace Modules\Department\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Modules\Ticket\Entities\Ticket;
use App\Profile;

class Department extends Model
{
    protected $fillable = ['name','email'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function hods(){
    return $this->hasMany(Profile::class);
    }
}
