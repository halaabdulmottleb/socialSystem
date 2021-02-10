<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\comment;
use Faker\Generator as Faker;

$factory->define(comment::class, function (Faker $faker) {
    return [

        'comment' => $faker->text($maxNbChars = 50),
        'post_id' => rand(1,1000),
        'user_id' => rand(1,100),
    ];
});
