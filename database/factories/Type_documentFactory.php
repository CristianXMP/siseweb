<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Type_document;
use Faker\Generator as Faker;

$factory->define(Type_document::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(2),
        'abreviatura' => 'c.c'
    ];
});
