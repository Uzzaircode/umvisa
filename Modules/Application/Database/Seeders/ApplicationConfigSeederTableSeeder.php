<?php

namespace Modules\Application\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class ApplicationConfigSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $data = [
            [
                'name' => 'running_no_prefix',
                'value' => 'ETRAVEL'
            ],
            [
                'name' => 'late_message',
                'value' => 'hello'
            ]
        ];
        DB::table('applicationconfigs')->insert($data);
    }
}
