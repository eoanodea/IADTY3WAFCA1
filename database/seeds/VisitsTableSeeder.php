<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Visit;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $role_patient = Role::where('name', 'patient')->first();
        $role_doctor = Role::where('name', 'doctor')->first();

        foreach($role_patient->users as $user) {
            $doctors = $role_doctor->users;
            $doctor = $doctors[rand(0, count($doctors) -1)];
            echo $doctor;
            
            // echo '\n single doctor';
            // echo $doctor;
            $visit = new Visit();

            $visit->notes = $faker->paragraph();
            $visit->duration = $faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 180);

            $visit->patient_id = $user->patient->id;
            $visit->doctor_id = $doctor->doctor->id;

            $visit->save();
        }    
    }
}
