<?php

use App\Educateur;
use Faker\Generator as Faker;

$factory->define(Educateur::class, function (Faker $faker) {
    return [
        'nom' => $faker->lastName ,
        'prenom' => $faker->name ,
    ];
});
