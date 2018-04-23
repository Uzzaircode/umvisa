<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ticket\Entities\Ticket;

class Application extends Model
{
    protected $fillable = ['name'];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
