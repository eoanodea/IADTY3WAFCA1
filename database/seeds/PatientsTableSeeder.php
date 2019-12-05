<?php

use App\Patient;
use App\Role;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Creates a patient for each user that has a patient role
     * in the database
     *
     * @return void
     */
    public function run()
    {
        $role_patient = Role::where('name', 'patient')->first();
        $faker = \Faker\Factory::create();

        foreach($role_patient->users as $user) {
            $patient = new Patient();
            $patient->has_insurance = false;
            $patient->insurance_company = $faker->company;
            $patient->policy_number = $faker->numberBetween(50000, 100000);

            $patient->user_id = $user->id;
            $patient->save();
        }
    }
}
