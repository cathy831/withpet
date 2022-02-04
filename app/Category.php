<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function spots()
    {
      return $this->belongsToMany('App\Spot');
    }
}
