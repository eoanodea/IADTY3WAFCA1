<?php

use App\Patient;
use App\Role;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $faker = \Faker\Factory::create();

        foreach($role_user->users as $user) {
            $patient = new Patient();
            $patient->has_insurance = false;
            $patient->insurance_company = $faker->company;
            $patient->policy_number = $faker->numberBetween(50000, 100000);

            $patient->user_id = $user->id;
            $patient->save();
        }
    }
}
