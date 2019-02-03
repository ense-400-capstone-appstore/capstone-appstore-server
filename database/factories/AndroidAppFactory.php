<?php

use Faker\Generator as Faker;
use App\AndroidApp;

$factory->define(AndroidApp::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'version' => '1.0.0',
        'description' => $faker->text,
        'price' => 0.00,
    ];
});

// Premium applications have a non-zero price
$factory->state(AndroidApp::class, 'premium', function (Faker $faker) {
    return [
        'price' => $faker->randomFloat(2, 0.1, 100)
    ];
});
