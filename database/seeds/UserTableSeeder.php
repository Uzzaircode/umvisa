<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profile;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => bcrypt('secret'),
        ]);
        $admin->profile->create([
            'user_id' => $admin->id,
            'avatar' => 'uploads/avatars/avatar1.jpg'
        ]);

        $user = DB::table('users')->insert([
            'name' => 'User',
            'email' => 'admin@test.com',
            'password' => bcrypt('secret'),
        ]);
        $user->profile->create([
            'user_id' => $admin->id,
            'avatar' => 'uploads/avatar/avatar2.jpg'
        ]);
    }
}
