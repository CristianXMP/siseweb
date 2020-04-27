<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Academic_assignment;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Academic_assignment::class, function (Faker $faker) {
    return [
        //
        'course_id' => random_int(1,5),
        'period_id' => random_int(1,5),
        'subject_id' => random_int(1,5),
        'teacher_id' => random_int(1,5),
    ];
});
