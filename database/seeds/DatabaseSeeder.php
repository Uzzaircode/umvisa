<?php 
use App\User;
use App\Role;
use App\Permission;
use Modules\Post\Entities\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Ko nak migrate:refresh before seeding ke ? By default tak migrate:refresh')) {
            // disable fk constrain check
            // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Cun!, database dah empty.");
            // enable back fk constrain check
            // \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        // Seed the default permissions
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
        $this->command->info('Default Permissions dah ditambah.');
        // Confirm roles needed
        if ($this->command->confirm('Create Roles untuk user, default ialah Admin dan User? [y|N]', true)) {
            // Ask for roles from input
            $input_roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,User');
            // Explode roles
            $roles_array = explode(',', $input_roles);
            // add roles
            foreach($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);
                if( $role->name == 'Admin' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Admin dapat semua permission');
                } else {
                    // for others by default only read access
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                }
                // create one user for each role
                $this->createUser($role);
            }
            $this->command->info('Roles ' . $input_roles . ' sudah ditambah');
        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('Added only default user role.');
        }
        
        $this->call(ProfileTableSeeder::class);
    }
    /**
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);
        if( $role->name == 'Admin') {
            $this->command->info('Here is your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
    }

   
}