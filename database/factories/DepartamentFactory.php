<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departament;
use Faker\Generator as Faker;

$factory->define(Departament::class, function (Faker $faker) {
    $values = array();
    for ($i=0; $i < 10; $i++) {
      // get a random digit, but always a new one, to avoid duplicates
      $values []= $faker->unique()->randomDigit;
    }
    return [
        //
        'nombre' => $faker->city(),
        'abreviatura' => $faker->countryISOAlpha3(),
        'countries_id' =>$values

    ];
});
