<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Booking;
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

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'booking_date' => $faker->name,
        'duration' => $faker->randomDigit,
        'check-in_date' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now', $timezone = null),
        'check-out_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 days', $timezone = null),
        'status' => $faker->randomElement($array = array('pending', 'cancelled', 'done')),
        'day_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 100),
        'dog_id' => function() {
          return factory(App\Dog::class)->create()->id;
        }
    ];
});
