<?php

use Faker\Generator as Faker;

$factory->define(App\Order_detail_delivery::class, function ($faker) {
    return [
        
        'delivery_id' => function () {
            return factory(App\Delivery::class)->create()->id;
        },
        'order_detail_id' => function () {
            return factory(App\Order_detail::class)->create()->id;
        }
    ];
});
