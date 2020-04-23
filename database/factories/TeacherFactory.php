<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        //
        'first_name' => $faker->firstName(),
        'second_name' => $faker->lastName(),
        'last_name' => $faker->lastName(),
        'city_id' => random_int(1,5),
        'profession' => $faker->sentence(2),
        'type_document_id' => random_int(1,5),
        'number_document' => $faker->phoneNumber,
        'expedition_date' => $faker->date(),
        'birth_date' => $faker->date()
    ];
});
