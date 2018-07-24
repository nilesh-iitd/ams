<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->unique()->email,
      'password' => app('hash')->make('12345'),
    ];
});

$factory->define(App\Athlete::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->name,
      'dob' => $faker->unique()->date(),
      'age' => $faker->numberBetween(5, 100),
      'height' => $faker->numberBetween(4, 7) + $faker->randomFloat(2, 0, 9),
      'weight' => $faker->numberBetween(4, 7) + $faker->randomFloat(2, 0, 9),
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->name,
      'logo' => $faker->url,
    ];
});

$factory->define(App\Sport::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->domainName,
    ];
});
