<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
  protected $table = 'markers';
  protected $fillable = [
    'id_device','lat','lng','pm10','pm25','temp','humidity','date','time'
  ];
}
