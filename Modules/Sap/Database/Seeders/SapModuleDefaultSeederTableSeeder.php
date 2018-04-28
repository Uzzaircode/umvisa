<?php

namespace Modules\Sap\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Sap\Entities\Sap;

class SapModuleDefaultSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        Sap::create([
            'name' => ucwords('general ledger'),
            'code' => strtoupper('gl'),            
        ]);
        Sap::create([
            'name' => ucwords('asset accounting'),
            'code' => strtoupper('aa'),            
        ]); 
        Sap::create([
            'name' => ucwords('treasury and risk management'),
            'code' => strtoupper('tr'),            
        ]); 
        Sap::create([
            'name' => ucwords('accounts payable'),
            'code' => strtoupper('ap'),            
        ]);
        Sap::create([
            'name' => ucwords('human capital management'),
            'code' => strtoupper('hr'),            
        ]);
        Sap::create([
            'name' => ucwords('funds management'),
            'code' => strtoupper('fm'),            
        ]);     
        Sap::create([
            'name' => ucwords('material management'),
            'code' => strtoupper('mm'),            
        ]);
        Sap::create([
            'name' => ucwords('gst-related'),
            'code' => strtoupper('gs'),            
        ]);
        Sap::create([
            'name' => ucwords('basis'),
            'code' => strtoupper('bs'),            
        ]);
    }
}
