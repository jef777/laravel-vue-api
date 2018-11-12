<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table='branch';

    public function headquater()
    {
      return $this->belongsTo(Headquater::class);
    }
}
