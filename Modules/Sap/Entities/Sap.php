<?php

namespace Modules\Sap\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Sap extends Model
{
    protected $fillable = ['name','code'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
