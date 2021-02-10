<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {
	
    return [
        'content' => $faker->text($maxNbChars = 50),
        'user_id' => rand(1,100),

    ];
});
