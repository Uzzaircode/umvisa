<?php

namespace App\Repositories;

/**
 * RepositoryInterface provides the standard functions to be expected of ANY
 * repository.
 */
interface RepositoryInterface
{
    public function create(array $attributes);
    
    public function all($columns = array('*'));
    
    public function find($id, $columns = array('*'));
    
    public function destroy($ids);
    
    public function pluck($column1, $column2);

    public function count();
    
    public function where($key, $column);
}
