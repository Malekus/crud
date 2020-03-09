<?php

use App\Bilan;
use App\Eleve;
use Faker\Generator as Faker;

$factory->define(Bilan::class, function (Faker $faker) {
    return [
        'dateDebut' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = '-5 days'),
        'dateFin' => $faker->dateTimeBetween($startDate = '-5 days', $endDate = '0 days'),
        'rapport' => $faker->text(100),
        'evaluation' => $faker->text(100),
        'mesure' => $faker->text(100),
        'eleve_id' => Eleve::all()->random()->id,
    ];
});
