<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\like;
use Faker\Generator as Faker;

$factory->define(like::class, function (Faker $faker) {
    return [
        'post_id' => rand(1,1000),
        'user_id' => rand(1,100),
    ];
});
