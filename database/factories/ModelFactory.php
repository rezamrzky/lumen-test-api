<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\users;
use app\User;
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

$factory->define(users::class, function (Faker $faker) {
    
    //inisialisasi nilai random untuk gender, status, dan created_at
    $genderArray = array('male', 'female');
    $gender = array_rand($genderArray);

    $statusArray = array('Active', 'Pending', 'Banned', 'Loss');
    $status = array_rand($statusArray);

    $created_date = $faker->dateTime;
    
    return [
        
        'firstName' => $faker->firstName($genderArray[$gender]),
        'lastName' => $faker->lastName,
        'gender' => $genderArray[$gender],
        'status' => $statusArray[$status],
        'email' => $faker->email,
        'city' => $faker->city,
        'address' => $faker->streetAddress,
        'phone' => $faker->e164PhoneNumber,
        'created_at' => $created_date,
        'updated_at' => $faker->dateTimeBetween($created_date, 'now', 'UTC')

    ];
});
