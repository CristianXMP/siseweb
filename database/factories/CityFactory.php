<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {


    return [
        //
        'nombre'=> $faker->city(),
        'abreviatura' => $faker->countryISOAlpha3(),
        'departament_id' =>$faker->randomDigit()
    ];
});
