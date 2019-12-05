<?php

use App\Doctor;
use App\Role;
use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Creates a doctor for each user that has a doctor role
     * in the database
     *
     * @return void
     */
    public function run()
    {
        $role_doctor = Role::where('name', 'doctor')->first();

        foreach($role_doctor->users as $user) {
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
