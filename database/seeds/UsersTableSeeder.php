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
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_patient = Role::where('name', 'patient')->first();

        $admin = new User ();
        $admin->first_name = 'Mo';
        $admin->last_name = 'Che';
        $admin->email = 'testadmin@test.ie';
        $admin->mobile_number = $this->random_phone();
        $admin->address = '20 Address Road, Addressville, Dublin';
        $admin->password = bcrypt('testtest');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User ();
        $user->first_name = 'Mo';
        $user->last_name = 'Che';
        $user->email = 'testdoctor@test.ie';
        $user->mobile_number = $this->random_phone();
        $user->address = '20 Address Road, Addressville, Dublin';
        $user->password = bcrypt('testtest');
        $user->save();
        $user->roles()->attach($role_doctor);

        $user = new User ();
        $user->first_name = 'Mo';
        $user->last_name = 'Che';
        $user->email = 'testpatient@test.ie';
        $user->mobile_number = $this->random_phone();
        $user->address = '20 Address Road, Addressville, Dublin';
        $user->password = bcrypt('testtest');
        $user->save();
        $user->roles()->attach($role_patient);

        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->roles()->attach(Role::where('name', 'doctor')->first());
        });

        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->roles()->attach(Role::where('name', 'patient')->first());
        });

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
