<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        //
        'course' => random_int(1,11),
        'variation' => 'A',
        'working_day' => $faker->sentence(1),
        'teacher_id' => random_int(1,5),

    ];
});
