<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

  protected $table='supplier';


  public function delivery()
  {
    return $this->belongsTo(Delivery::class);
  }

  public function product()
  {
    return $this->hasMany(Product::class);
  }

}
