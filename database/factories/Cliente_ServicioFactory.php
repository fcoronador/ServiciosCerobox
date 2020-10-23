<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\cliente_servicio;
use Faker\Generator as Faker;

$factory->define(cliente_servicio::class, function (Faker $faker) {
    return [
        'cliente_id' => App\cliente::all()->random()->id,
        'servicio_id' => App\servicio::all()->random()->id
    ];
});
