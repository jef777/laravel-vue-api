<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function ($faker) {
    return [
       
        'delivery_date' => $faker->dateTimeBetween('Y-m-d'),
        'delivery_id' => $faker->numberBetween(5,10)
        
    ];
});
