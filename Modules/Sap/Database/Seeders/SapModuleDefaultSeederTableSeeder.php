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
            'code' => strtoupper('sap-fi-gl'),            
        ]);
        Sap::create([
            'name' => ucwords('asset accounting'),
            'code' => strtoupper('sap-fi-aa'),            
        ]); 
        Sap::create([
            'name' => ucwords('treasury and risk management'),
            'code' => strtoupper('sap-trm'),            
        ]); 
        Sap::create([
            'name' => ucwords('accounts payable'),
            'code' => strtoupper('sap-fi-ap'),            
        ]);
        Sap::create([
            'name' => ucwords('human capital management'),
            'code' => strtoupper('sap-hcm'),            
        ]);
        Sap::create([
            'name' => ucwords('funds management'),
            'code' => strtoupper('sap-psm-fm'),            
        ]);     
        Sap::create([
            'name' => ucwords('material management'),
            'code' => strtoupper('sap-lo-mm'),            
        ]);
        Sap::create([
            'name' => ucwords('gst-related'),
            'code' => strtoupper('um-oth-gst'),            
        ]);
        Sap::create([
            'name' => ucwords('basis'),
            'code' => strtoupper('sap-basis'),            
        ]);
    }
}
