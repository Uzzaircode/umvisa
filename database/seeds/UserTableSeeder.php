<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        // factory(App\User::class, 2)->create()->each(function($u) {
        //     $u->profile()->save(factory(App\Profile::class)->make());
        //     $u->assignRole('User');
        //   });
        $data = [
            // Students
            [
                'name' => 'student1',
                'email' => 'student1@um.edu.my',
                'password' => Hash::make('secret')
            ],
            [
                'name' => 'student2',
                'email' => 'student2@um.edu.my',
                'password' => Hash::make('secret')
            ],
            [
                'name' => 'student3',
                'email' => 'student3@um.edu.my',
                'password' => Hash::make('secret')
            ],

// Supervisor
            [
                'name' => 'supervisor1',
                'email' => 'supervisor1@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'supervisor2',
                'email' => 'supervisor2@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'supervisor3',
                'email' => 'supervisor3@um.edu.my',
                'password' => Hash::make('secret'),
            ],

// Deputy Dean
            [
                'name' => 'deputydean1',
                'email' => 'deputydean1@um.edumy',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'deputydean2',
                'email' => 'deputydean2@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'deputydean3',
                'email' => 'deputydean3@um.edu.my',
                'password' => Hash::make('secret'),
            ],

// College Fellow 
            [
                'name' => 'collegefellow1',
                'email' => 'collegefellow1@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'collegefellow2',
                'email' => 'collegefellow2@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'collegefellow3',
                'email' => 'collegefellow3@um.edu.my',
                'password' => Hash::make('secret'),
            ],

// College Master
            [
                'name' => 'collegemaster1',
                'email' => 'collegemaster1@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'collegemaster2',
                'email' => 'collegemaster2@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'collegemaster3',
                'email' => 'collegemaster3@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            // Dean
            [
                'name' => 'dean1',
                'email' => 'dean1@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'dean2',
                'email' => 'dean2@um.edu.my',
                'password' => Hash::make('secret'),
            ],
            [
                'name' => 'dean3',
                'email' => 'dean3@um.edu.my',
                'password' => Hash::make('secret'),
            ],

        ];
        $users = User::insert($data);
        dd($users);

        $um = DB::table('users')->get();
        foreach ($um as $u) {
            Profile::create([
                'user_id' => $u->id,
                'avatar' => 'uploads/avatars/avatar1.jpg',
            ]);
        }
    }
}
