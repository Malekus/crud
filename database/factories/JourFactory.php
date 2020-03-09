<?php

use App\Jour;
use App\Planning;
use Faker\Generator as Faker;

$factory->define(Jour::class, function (Faker $faker) {
    return [
        'dateExclu' => $faker->dateTimeBetween($startDate = '-90 days', $endDate = '-1 days'),
        'matinAbsent' => $faker->randomElement(['0', '1']),
        'matinRetard' => $faker->randomElement(['0', '1']),
        'apremAbsent' => $faker->randomElement(['0', '1']),
        'apremRetard' => $faker->randomElement(['0', '1']),
        'travailMatin' => $faker->text(200),
        'travailAprem' => $faker->text(200),
        'planning_id' => Planning::all()->random()->id,
    ];
});
