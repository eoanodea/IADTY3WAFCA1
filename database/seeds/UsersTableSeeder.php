<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User ();
        $admin->first_name = 'Mo';
        $admin->last_name = 'Che';
        $admin->email = 'testadmin@test.ie';
        $admin->mobile_number = '+353 86 444 2822';
        $admin->address = '20 Address Road, Addressville, Dublin';
        $admin->password = bcrypt('testtest');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User ();
        $user->first_name = 'Mo';
        $user->last_name = 'Che';
        $user->email = 'testuser@test.ie';
        $user->mobile_number = '+353 86 444 2822';
        $user->address = '20 Address Road, Addressville, Dublin';
        $user->password = bcrypt('testtest');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
