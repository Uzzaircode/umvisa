<?php

use Illuminate\Database\Seeder;
use App\Profile;
class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'user_id'=> 1,
            'avatar'=> 'uploads/avatars/avatar1.jpg'
        ]);
        Profile::create([
            'user_id'=> 2,
            'avatar'=> 'uploads/avatars/avatar2.jpg'
        ]);
    }
}
