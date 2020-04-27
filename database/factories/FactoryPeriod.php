<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Period;
use Faker\Generator as Faker;

$factory->define(Period::class, function (Faker $faker) {
    return [
        //
        'nombre'=> random_int(1,4),
        'fecha_inicial' => $faker->date(),
        'fecha_final' => $faker->date(),
    ];
});
