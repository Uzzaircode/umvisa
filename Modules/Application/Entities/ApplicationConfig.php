<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;

class ApplicationConfig extends Model
{
    protected $table = 'applicationconfigs';
    protected $guarded = [];
}
