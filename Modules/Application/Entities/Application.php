<?php

namespace Modules\Application\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\ModelStatus\HasStatuses;


class Application extends Model
{
    use HasStatuses;

    protected $guarded = [];
}
