<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function ($faker) {
    return [
       
        'supplier_id' => function () {
            return factory(App\Supplier::class)->create()->id;
        }
    ];
});
