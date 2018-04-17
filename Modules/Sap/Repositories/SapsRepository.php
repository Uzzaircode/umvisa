<?php

namespace Modules\Sap\Repositories;

use Modules\Sap\Entities\Sap;

class SapsRepository{

    public function all(){
        return Sap::all();
    }

}