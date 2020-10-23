<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\servicio;
use Faker\Generator as Faker;
use phpDocumentor\Reflection\PseudoTypes\True_;

$factory->define(servicio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->companySuffix,
        'img' => 'https://i.imgur.com/Hvw1negs.png',
        'Tservcio' => true,
        'FechaIni' => $faker->date($format = 'Y/m/d', $max = 'now'),
        'FechaFin' => $faker->date($format = 'Y/m/d', $max = 'now'),
        'obser' => $faker->text($maxNbChars = 200)
    ];
});
