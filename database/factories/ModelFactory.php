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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Company::class, function ( $faker) {

    return [
        'name' => $faker->name,
        'logo' => 'logo.png',
        'email' => $faker->email,
        'website' => 'www.'.str_random(4).'.com',
    ];
});



$factory->define(App\Employee::class, function ($faker) {
     
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'company_id' => function() {
        				return factory('App\Company')->create()->id;
        				},
        'phone' => str_random(4),
        'email' => $faker->email,
    ];
});