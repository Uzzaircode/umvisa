<?php

namespace Modules\Department\Repositories;

use App\Repositories\RepositoryInterface;

interface DeptRepoInterface extends RepositoryInterface {
    
    public function all($columns = array('*'));
    
    public function create(array $attributes);


}