<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'markers';
    protected $fillable = [
      'id_device','lat','lng','pm10','pm25','temp','humidity','date','time'
    ];

    public function setUpdatedAtAttribute($value)
{
    // to Disable updated_at
}
}
