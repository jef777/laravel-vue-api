<?php

use Faker\Generator as Faker;

$factory->define(App\Order_detail::class, function ($faker) {
    return [

        'product_quantity' => $faker->numberBetween(1,10),

        'product_id' => function () {
            return factory(App\Product::class)->create()->id;
        },
        'order_id' => function () {
            return factory(App\Order::class)->create()->id;
        }
    ];
});
