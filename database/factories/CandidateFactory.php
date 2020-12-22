<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'votes' => $faker->numberBetween(0,400),
        'funcao' =>$faker->unique()->safeEmail
    ];
});