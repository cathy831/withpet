<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
      'body',
      'spot_id',
      'user_id'
    ];
    
    public function spot()
    {
        return $this->belongsTo('App\Spot');
    }
    
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
