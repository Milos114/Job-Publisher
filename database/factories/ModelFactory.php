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

use App\User;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Job::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(User::class)->make()->id,
        'title' => $faker->text,
        'description' => $faker->paragraph,
        'email' => $faker->email,
        'approve' => 1,
    ];
});
