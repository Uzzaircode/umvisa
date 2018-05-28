<?php

namespace Modules\Ticket\Repositories;

use App\Abstracts\Repository as AbstractRepository;

class RepliesRepository extends AbstractRepository
{
    protected $modelClassName = 'Modules\Ticket\Entities\Reply';
}
