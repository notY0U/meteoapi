<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

// const tags = [1 => 'clear', 2 => 'isolated-clouds', 3 => 'scattered-clouds', 4 => 'overcast',
//     5 => 'light-rain', 6 => 'moderate-rain', 7 => 'heavy-rain', 8 => 'sleet', 9 => 'light-snow',
//     10 => 'moderate-snow', 11 => 'heavy-snow', 12 => 'fog', 13 => 'na'];
$factory->define(Product::class, function (Faker $faker) {

    return [
        // 'Umbrella' => [5, 6, 7, 8], 'Knitted Hat' => [9, 10, 11],
        //
    ];
});
