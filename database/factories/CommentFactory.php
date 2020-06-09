<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Comment;
use Faker\Generator as Faker;
use App\Model\Film;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'film_id' => function(){
            return Film::all()->random();
        },
        'name' => $faker->name,
        'comment' => $faker->paragraph
    ];
});
