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
    
    public function getPaginateByLimit(int $limit_count = 9)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }
    
    public function erea()
    {
    return $this->belongsTo('App\Erea');
    }
    
}
