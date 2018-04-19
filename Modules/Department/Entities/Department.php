<?php

namespace Modules\Department\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
    protected $fillable = ['name','email'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
