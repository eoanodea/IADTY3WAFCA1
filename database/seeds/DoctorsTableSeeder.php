<?php

use App\Doctor;
use App\Role;
use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        foreach($role_admin->users as $user) {
            $doctor = new Doctor();

            $doctor->date_started = $this->random_date();
            $doctor->user_id = $user->id;
            $doctor->save();
        }
    }
    private function random_date() {
        $faker = \Faker\Factory::create();

        return $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = 'Europe/Paris');
    }
    
}
