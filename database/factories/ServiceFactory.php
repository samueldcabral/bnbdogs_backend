<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Service;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Service::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence($nbWords = 3, $variableNbWords = false),
        'obs' => $faker->sentence($nbWords = 5, $variableNbWords = false),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 100),
    ];
});
