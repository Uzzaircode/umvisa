<?php

namespace Modules\Application\Repositories;

use App\Repositories\RepositoryInterface;

interface ApplicationInterface extends RepositoryInterface {
    
    public function all($columns = array('*'));
    
    public function create(array $attributes);
}