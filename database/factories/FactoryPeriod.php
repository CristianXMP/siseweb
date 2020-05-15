<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Period;
use Faker\Generator as Faker;

$factory->define(Period::class, function (Faker $faker) {
    return [
        //
        'nombre'=> 1,
        'fecha_inicial' => now()

    ];
});
