<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'has_insurance' => true,
        'insurance_company' => $faker->company,
        'policy_number' => $faker->numberBetween(50000, 100000)
    ];
});
