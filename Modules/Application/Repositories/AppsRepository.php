<?php 
namespace Modules\Application\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Modules\Application\Repositories\AppRepoInterface;


class AppsRepository extends AbstractRepository implements AppRepoInterface
{
	protected $modelClassName = 'Modules\Application\Entities\Application';
}