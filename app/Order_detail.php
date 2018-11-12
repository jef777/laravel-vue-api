<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{

    protected $table='order_detail';


    public function product()
    {
      return $this->belongsTo(Product::class);
    }

    public function order_detail_delivery()
    {
      return $this->hasMany(Order_detail_delivery::class);
    }

    public function order()
    {
      return $this->belongsTo(Order::class);
    }

}
