<?php

use Illuminate\Database\Seeder;
use App\Profile;
use Faker\Factory as Faker;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $um = DB::table('users')->get();
        $faker = Faker::create();
        foreach ($um as $u) {
            Profile::create([
                'user_id' => $u->id,
                'avatar' => 'uploads/avatars/avatar1.jpg',
                'title' => $faker->title                
            ]);
        }        
    }
}
