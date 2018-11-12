<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table='order';


    public function order_detail()
    {
      return $this->hasMany(Order_detail::class);
    }

    public function headquater()
    {
      return $this->belongsTo(Headquater::class);
    }

    public function delivery_detail()
    {
      return $this->hasManyThrough(Order_detail_delivery::class, Order_detail::class);
    }
}
