<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\DnD35\BaseClass::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence
    ];
});