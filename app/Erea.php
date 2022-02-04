<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Erea extends Model
{
    public function spots()   
    {
      return $this->hasMany('App\Spot');
    }
}
