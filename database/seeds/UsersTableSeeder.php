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

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = $faker->email;
            $user->mobile_number = $this->random_phone();
            $user->address = $faker->address;
            $user->password = bcrypt($faker->password);
            $user->save();
            $user->roles()->attach($role_admin);
        }
        
        for($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = $faker->email;
            $user->mobile_number = $this->random_phone();
            $user->address = $faker->address;
            $user->password = bcrypt($faker->password);
            $user->save();
            $user->roles()->attach($role_user);
        }
    }
    private function random_phone() {
        return '0' . 
            $this->random_str(2, '0123456789'). '-' . 
            $this->random_str(7, '0123456789');
    }
    //fill in keyspace
    private function random_str($length, $keyspace) {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        };
        return implode('', $pieces);
    }
}
