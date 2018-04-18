<?php

namespace Modules\Department\Entities;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name','email'];
}
