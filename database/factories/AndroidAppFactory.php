<?php

use Faker\Generator as Faker;

$factory->define(App\AndroidApp::class, function (Faker $faker) {
    return [
        "name" => str_random(10),
        "description" => str_random(50),
        "version" => str_random(10),
        "price" => $faker->randomFloat(2, 0, 10),
        "avatar" => str_random(10)
    ];
});
