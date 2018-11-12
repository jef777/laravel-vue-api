<?php

use Faker\Generator as Faker;

$factory->define(App\Delivery::class, function ($faker) {
    return [
        'delivery_date' => $faker->dateTimeBetween('Y-m-d'),
        'supplier_id' => function () {
            return factory(App\Supplier::class)->create()->id;
        }
    ];
});
