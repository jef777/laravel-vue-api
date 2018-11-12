<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquater extends Model
{

    protected $table='headquater';


    public function branch()
    {
      return $this->hasMany(Branch::class);
    }
}
