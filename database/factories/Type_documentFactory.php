<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Type_document;
use Faker\Generator as Faker;

$factory->define(Type_document::class, function (Faker $faker) {
    return [
        'nombre' => '1193574481',
        'abreviatura' => 'c.c'
    ];
});
