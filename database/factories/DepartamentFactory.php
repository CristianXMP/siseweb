<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departament;
use Faker\Generator as Faker;

$factory->define(Departament::class, function (Faker $faker) {

    return [
        //
        'nombre' => $faker->city(),
        'abreviatura' => $faker->countryISOAlpha3(),
        'countries_id' =>random_int(1,5)

    ];
});
