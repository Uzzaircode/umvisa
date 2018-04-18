<?php 
namespace Modules\Department\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Modules\Department\Repositories\DeptRepoInterface;


class DeptsRepository extends AbstractRepository implements DeptRepoInterface
{
	protected $modelClassName = 'Modules\Department\Entities\Department';	    
}