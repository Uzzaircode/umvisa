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
            'name' => strtoupper('bahagian akaun dan pelaburan'),
            'email' => strtoupper('akaun@brillante.com')
        ]);
        Department::create([
            'name' => strtoupper('bahagian pembayaran dan perbelanjaan'),
            'email' => strtoupper('bayar@brillante.com')
        ]);
        Department::create([
            'name' => strtoupper('bahagian pengurusan pembayaran kewangan dan staf'),
            'email' => strtoupper('urusakaun@brillante.com')
        ]);
        Department::create([
            'name' => strtoupper('bahagian belanjawan dan kewangan korporat'),
            'email' => strtoupper('belanjawan@brillante.com')
        ]);
        Department::create([
            'name' => strtoupper('bahagian perolehan'),
            'email' => strtoupper('oleh@brillante.com')
        ]);
        Department::create([
            'name' => strtoupper('unit pentadbiran dan kewangan am'),
            'email' => strtoupper('tadbir@brillante.com')
        ]);        
    }
}
