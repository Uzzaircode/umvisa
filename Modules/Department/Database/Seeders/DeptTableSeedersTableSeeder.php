<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Entities\Department;

class DeptTableSeedersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        
        Department::create([
            'name' => ucwords('bahagian akaun dan pelaburan'),
            'email' => 'akaun@um.com'
        ]);
        Department::create([
            'name' => ucwords('bahagian pembayaran dan perbelanjaan'),
            'email' => 'bayar@um.com'
        ]);
        Department::create([
            'name' => ucwords('bahagian pengurusan pembayaran kewangan dan staf'),
            'email' => 'urusakaun@um.com'
        ]);
        Department::create([
            'name' => ucwords('bahagian belanjawan dan kewangan korporat'),
            'email' => 'belanjawan@um.com'
        ]);
        Department::create([
            'name' => ucwords('bahagian perolehan'),
            'email' => 'oleh@um.com'
        ]);
        Department::create([
            'name' => ucwords('unit pentadbiran dan kewangan am'),
            'email' => 'tadbir@um.com'
        ]);        
    }
}
