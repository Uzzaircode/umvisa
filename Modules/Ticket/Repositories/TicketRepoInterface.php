<?php

namespace Modules\Ticket\Repositories;

use App\Repositories\RepositoryInterface;

interface TicketRepoInterface extends RepositoryInterface {
    
    public function all($columns = array('*'));
    
    public function create(array $attributes);

    // public function update($id, array $attributes);


}