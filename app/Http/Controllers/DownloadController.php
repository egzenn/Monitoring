<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Map;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;

class DownloadController extends Controller
{
    public function index()
    {
      $map = new Map;

      $marker="2,2017-01-15,15:30:06,51° 14' 12.607'',S,22° 32' 56.055'',E,197.06,241.14,-10,154";

      $downloaded_data = explode(",",$marker);

      $id_device = $downloaded_data[0];
      $date = $downloaded_data[1];
      $time = $downloaded_data[2];
      $lat = $downloaded_data[3];
      $NorS = $downloaded_data[4];
      $lng = $downloaded_data[5];
      $EorW = $downloaded_data[6];
      $pm10 = $downloaded_data[7];
      $pm25 = $downloaded_data[8];
      $temp = $downloaded_data[9];
      $humidity = $downloaded_data[10];

      $explode_lat = explode(" ",$lat);
      $explode_lng = explode(" ",$lng);

      $deg_lat=$explode_lat[0];
      $min_lat=$explode_lat[1];
      $sec_lat=$explode_lat[2];
      $deg_lng=$explode_lng[0];
      $min_lng=$explode_lng[1];
      $sec_lng=$explode_lng[2];

      $database_lat = $deg_lat+((($min_lat*60)+($sec_lat))/3600);
      $database_lng = $deg_lng+((($min_lng*60)+($sec_lng))/3600);

      if($NorS=="N"){
        $latt=$database_lat;
      }else if($NorS=="S"){$latt='-'.$database_lat;}

      if($EorW=="W"){
        $lngg=$database_lng;
      }else if($EorW=="E"){$lngg='-'.$database_lng;}



      $map->id_device = $id_device;
      $map->date = $date;
      $map->time = $time;
      $map->lat = $latt;
      $map->lng = $lngg;
      $map->pm10 = $pm10;
      $map->pm25 = $pm25;
      $map->temp = $temp;
      $map->humidity = $humidity;
      $map->save();
      return view('pages.home');

    }
}
