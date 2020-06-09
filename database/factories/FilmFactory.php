<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Film;
use Faker\Generator as Faker;
use App\Model\Genre;
use Illuminate\Support\Str;

$factory->define(Film::class, function (Faker $faker) {
    $name = $faker->sentence(3,true);
    return [
        'name' => $name,
        'slug' => Str::slug($name,'-'),
        'description' => $faker->paragraph,
        'release' => $faker->date,
        'date' => $faker->date,
        'rating' => $faker->numberBetween(1,5),
        'ticket' => $faker->numberBetween(10,50),
        'price' => $faker->numberBetween(100,1000),
        'country' => $faker->country,
        'photo' => 'https://picsum.photos/seed/picsum/200/300',
        'genre_id' => function(){
            return Genre::all()->random();
        }
    ];
});
