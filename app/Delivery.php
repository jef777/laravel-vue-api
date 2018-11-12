<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{

  protected $table='delivery';


    public function order_detail_delivery()
  {
    return $this->hasMany(Order_detail_delivery::class);
  }

      public function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }

  
}
