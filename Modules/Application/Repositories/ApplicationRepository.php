<?php
namespace Modules\Application\Repositories;

use App\Abstracts\Repository as AbstractRepository;

class ApplicationRepository extends AbstractRepository{

    protected $modelClassName = "Modules\Application\Entities\Application";

}