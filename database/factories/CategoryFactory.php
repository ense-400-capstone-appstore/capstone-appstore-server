<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});
