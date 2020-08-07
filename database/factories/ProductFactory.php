<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $image = '';
    return [
        'title'         => $faker->word,
        'description'   => $faker->sentence,
        'image'         => $image,
        'on_sale'       => true,
        'rating'        => $faker->numberBetween(0, 5),
        'sold_count'    => 0,
        'review_count'  => 0,
        'price'         => 0,
    ];
});
