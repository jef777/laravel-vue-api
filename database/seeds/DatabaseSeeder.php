<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\Supplier::class,5)->create();
        factory(App\Branch::class,5)->create();
        factory(App\Delivery::class,5)->create();
        factory(App\Headquater::class,5)->create();
        factory(App\Order_detail_delivery::class,5)->create();
        factory(App\Order_detail::class,5)->create();
        factory(App\Order::class,5)->create();
        factory(App\Product::class,5)->create();
        

    }
}
