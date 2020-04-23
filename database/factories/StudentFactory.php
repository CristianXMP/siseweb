<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        //
        'first_name' => $faker->firstName(),
        'second_name' => $faker->lastName(),
        'last_name' => $faker->lastName(),
        'city_id' => random_int(1,5),
        'document_type_id' => random_int(1,5),
        'number_document' => $faker->phoneNumber,
        'expedition_date' => $faker->date(),
        'birth_date' => $faker->date(),
        'course_id'=> random_int(1,5)
    ];
});
