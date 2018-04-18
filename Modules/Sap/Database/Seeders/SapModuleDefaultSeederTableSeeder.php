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
            'name' => strtoupper('general ledger'),
            'code' => strtoupper('sap-fi-gl'),            
        ]);
        Sap::create([
            'name' => strtoupper('asset accounting'),
            'code' => strtoupper('sap-fi-aa'),            
        ]); 
        Sap::create([
            'name' => strtoupper('treasury and risk management'),
            'code' => strtoupper('sap-trm'),            
        ]); 
        Sap::create([
            'name' => strtoupper('accounts payable'),
            'code' => strtoupper('sap-fi-ap'),            
        ]);
        Sap::create([
            'name' => strtoupper('human capital management'),
            'code' => strtoupper('sap-hcm'),            
        ]);
        Sap::create([
            'name' => strtoupper('funds management'),
            'code' => strtoupper('sap-psm-fm'),            
        ]);     
        Sap::create([
            'name' => strtoupper('material management'),
            'code' => strtoupper('sap-lo-mm'),            
        ]);
        Sap::create([
            'name' => strtoupper('gst-related'),
            'code' => strtoupper('um-oth-gst'),            
        ]);
        Sap::create([
            'name' => strtoupper('basis'),
            'code' => strtoupper('sap-basis'),            
        ]);
    }
}
