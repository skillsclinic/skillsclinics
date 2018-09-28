<?php

use App\Profile;
use App\Session;
use App\Subject;
use App\Tutee;
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'id_number' => $faker->numberBetween(100000, 999999),
        'role' => $faker->randomElement([User::ADMIN, User::SENIOR_MENTOR, User::PROF, User::JUNIOR_MENTOR, User::STREAM, User::STUDENT]),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(Subject::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
    ];
});

$factory->define(Tutee::class, function (Faker $faker) {
    return [
        'student_id' => User::All()->where('role', '=', User::STUDENT)->random()->id,
        'subject_id' => Subject::All()->random()->id,
        'professor' => $faker->name,
        'month' => $faker->monthName,
        'schoolYear' => $faker->year
    ];
});

$factory->define(Session::class, function (Faker $faker) {
    return [
        'tutee_id' => Tutee::All()->random()->id,
        'mentor_id' => User::All()->where('role', '=', User::SENIOR_MENTOR)->random()->id,
        'session_no' => $faker->numberBetween(1, 20),
        'date' => $faker->date(),
        'time_in' => $faker->time(),
        'time_out' => $faker->time(),
        'areaOfConcern' => $faker->sentence,
        'pre_test' => $faker->numberBetween(1,10),
        'post_test' => $faker->numberBetween(1,10),
        'remarks' => $faker->numberBetween(1,10),
    ];
});







