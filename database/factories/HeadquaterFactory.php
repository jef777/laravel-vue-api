<?php

use Faker\Generator as Faker;

$factory->define(App\Headquater::class, function ($faker) {
    return [

        'branch_id' => function () {
            return factory(App\Branch::class)->create()->id;
        }
    ];
});
