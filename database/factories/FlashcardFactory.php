<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flashcard;
use Faker\Generator as Faker;

$factory->define(Flashcard::class, function (Faker $faker) {
    return [
        'word' => $faker->unique()->word(),
        'definition' => $faker->sentence(8, true),
        'user_id' => function () {
        	return factory(App\User::class)->create()->id;
        }
    ];
});
