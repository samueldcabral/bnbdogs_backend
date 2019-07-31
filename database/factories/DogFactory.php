<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Dog;
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

$factory->define(Dog::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween($min = 1, $max = 15),
        'weight' => $faker->numberBetween($min = 1, $max = 100),
        'breed' => $faker->sentence($nbWords = 2, $variableNbWords = false),
        'obs' => $faker->sentence($nbWords = 5, $variableNbWords = false),
        'user_id' => function() {
          return factory(App\User::class)->create()->id;
        }
    ];
});
