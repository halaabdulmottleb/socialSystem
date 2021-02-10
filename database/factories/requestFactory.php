<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\friendRequest;
use Faker\Generator as Faker;

$factory->define(friendRequest::class, function (Faker $faker) {

    return [
        'from_id' => rand(1,100),
        'to_id' => rand(1,100),

    ];
});
