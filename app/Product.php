<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $table='product';
 

    public function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }

    public function order_detail()
    {
      return $this->hasMany(Order_detail::class);
    }

    
}
