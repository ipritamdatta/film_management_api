<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Genre;
use Faker\Generator as Faker;

$factory->define(Genre::class, function (Faker $faker) {
    return [
        'genre_name' => $faker->word
    ];
});
