<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\cliente;
use Faker\Generator as Faker;

$factory->define(cliente::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->name,
        'cedula'=>$faker->unique()->numberBetween($min = 1000, $max = 9000),
        'correo'=>$faker->email,
        'telefono'=>$faker->unique()->numberBetween($min = 1000000, $max = 9000000),
        'obser'=>$faker->text($maxNbChars = 200),
        'img' => 'https://i.imgur.com/Hvw1negs.png'
    ];
});
