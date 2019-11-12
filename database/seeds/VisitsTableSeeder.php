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
        // $user_id = Role::where('name', 'admin')->first();

        // $faker = \Faker\Factory::create();

        // //Create a few articles in our DB
        // for ($i = 0; $i < 50; $i++) {
        //     $visit = new Visit();

        //     $visit->notes = $faker->paragraph;
        //     $visit->duration = $faker->randomDigitNotNull;
        //     $visit->user_id = $user_id;
        //     $visit->save();
        // }
    }
}
