<?php

use App\Planning;
use App\Bilan;
use Faker\Generator as Faker;

$factory->define(Planning::class, function (Faker $faker) {
    return [
        'dateDebut' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = '-5 days'),
        'dateFin' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = '0 days'),
        'bilan_id' => Bilan::all()->random()->id,
    ];
});
