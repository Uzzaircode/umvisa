<?php 
namespace Modules\Sap\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Modules\Sap\Repositories\SapRepoInterface;


class SapsRepository extends AbstractRepository implements SapRepoInterface
{
	protected $modelClassName = 'Modules\Sap\Entities\Sap';
		
}