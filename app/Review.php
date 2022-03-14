<?php

namespace App;

use Auth;
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
    
    public function getOwnPaginateByLimit(int $limit_count2 = 1)
    {
        return $this::with('images')->find(Review::id())->images()->orderBy('updated_at', 'DESC')->paginate($limit_count2);
    }
    // myreview.bladeにおける写真のページネーション
}
