<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [

        'name' => $faker->word,
        'details' => $faker->paragraph,
        'price' => $faker->randomFloat(2,100,10000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2,30),
    ];
});
