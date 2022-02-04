<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = [
      'spot_name',
      'category_id',
      'erea_id',
      'address',
      'open_close',
      'off',
    ];
    
    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }
    
    public function erea()
    {
    return $this->belongsTo('App\Erea');
    }
    
}
