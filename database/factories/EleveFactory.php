<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Eleve;
use App\Etablissement;
use App\Educateur;
use Faker\Generator as Faker;

$factory->define(Eleve::class, function (Faker $faker) {
    return [
        'nom' => $faker->lastName ,
        'prenom' => $faker->name,
        'sexe' => $faker->randomElement(['femme', 'homme']),
        'dateNaissance' => $faker->dateTimeBetween($startDate = '-15 years', $endDate = '-10 years'),
        'classe' => $faker->randomElement(['6ème', '5ème', '4ème', '3ème']),
        'ville' => $faker->randomElement(['Stains', 'Bagnolet', 'Épinay-sur-Seine']),
        'etablissement_id' => Etablissement::all()->random()->id,
        'educateur_id' => Educateur::all()->random()->id,
    ];
});
