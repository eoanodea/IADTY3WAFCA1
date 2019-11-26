<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visit;
use Faker\Generator as Faker;

$factory->define(Visit::class, function (Faker $faker) {
    return [
        'notes' => $faker->sentence(),
        'duration' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 180)
    ];
});
