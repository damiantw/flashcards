<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flashcard;
use Faker\Generator as Faker;

$factory->define(Flashcard::class, function (Faker $faker) {
    return [
        'word' => $faker->unique()->word(),//one word
        'definition' => $faker->sentence(8, true),//multiple words
        //tie it to a user with user_id
        //for now just hard coding this to users I manually made
        'user_id' => rand(1, 2)
        //best practice should be something like
        //'user_id' => $factory->create(App\User::class)->id,
    ];
});
