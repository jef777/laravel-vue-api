<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail_delivery extends Model
{

    protected $table='order_detail_delivery';


    public function delivery()
    {
      return $this->belongsTo(Delivery::class);
    }

    public function order_detail()
    {
      return $this->belongsTo(Order_detail::class);
    }
}
