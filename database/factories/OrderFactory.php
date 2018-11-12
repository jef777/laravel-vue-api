<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function ($faker) {
    return [
        
        'order_date' => $faker->dateTimeBetween('Y-m-d'),
        
        'headquater_id' => function () {
            return factory(App\Headquater::class)->create()->id;
        }
    ];
});
