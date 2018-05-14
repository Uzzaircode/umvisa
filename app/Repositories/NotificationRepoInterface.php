<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

interface NotificationRepoInterface extends RepositoryInterface {
    
    public function all($columns = array('*'));
    
    public function create(array $attributes);

    // public function update($id, array $attributes);


}