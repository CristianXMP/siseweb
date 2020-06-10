<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->sentence(1),
        'abreviatura' => 'abcd',
    ];
});