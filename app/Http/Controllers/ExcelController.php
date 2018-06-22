<?php

namespace App\Http\Controllers;

use App\Map;
use Illuminate\Http\Request;
use Excel;
use Input;

use App\Http\Requests;

class ExcelController extends Controller
{
   public function getImport()
    {
      return view('excel.import');
    }

    public function postImport()
    {
      if (Input::hasFile('file')) {
            $file = Input::file('file');
            Excel::load($file, function($reader) {
                $reader->formatDates(true, 'Y-m-d');
                $results = $reader->get();
                 foreach ($results as $result)
                {
                    //dd($result); // for testing
                    $map = new Map;

                    $map->id_device = $result->id_device;
                    $map->lat = $result->lat;
                    $map->lng = $result->lng;
                    $map->pm10 = $result->pm10;
                    $map->pm25 = $result->pm25;
                    $map->temp = $result->temp;
                    $map->humidity = $result->humidity;
                    $map->date = $result->date;
                    //$map->time = $result->time;
                    $map->save();
                }

         });
    }
    	return redirect('import')->with("message","Add to database");
    }
}
