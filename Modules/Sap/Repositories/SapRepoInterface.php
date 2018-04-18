<?php

namespace Modules\Sap\Repositories;

use App\Repositories\RepositoryInterface;

interface SapRepoInterface extends RepositoryInterface {
    
    public function all($columns = array('*'));
    
    public function create(array $attributes);


}