<?php

namespace Modules\Application\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Application\Entities\Application;

class AppListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Application::create([
            'name' => strtoupper('eproc'),            
        ]);
        Application::create([
            'name' => ucwords('sistem booking'),            
        ]);
        Application::create([
            'name' => ucwords('e-kemajuan'),            
        ]);        
        Application::create([
            'name' => strtoupper('e-keselamatan'),         
        ]);        
    }
}
