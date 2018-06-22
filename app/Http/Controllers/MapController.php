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

class MapController extends Controller
{
    public function index(Request $request){

    $maps = DB::select('SELECT null FROM markers WHERE date=CURDATE()');
    $datefrom = $request->input('datefrom');
    $dateto = $request->input('dateto');
    $timefrom = $request->input('timefrom');
    $timfrom = $timefrom.':00';
    $timeto = $request -> input('timeto');
    $timto = $timeto.':00';
    $type = $request->input('type');
    if(!empty($datefrom and $dateto and $timefrom and $timeto and $type)){
        $maps = Map::select('lat','lng',$type,'temp','humidity','date','time')
                    ->where(function($query) use ($datefrom,$dateto,$timfrom,$timto){
                        $query->whereBetween('date',array($datefrom,$dateto))
                        ->whereBetween('time',array($timfrom,$timto));
                    })
                    ->get();
    }
        return view('maps.index',compact('maps'));
    }

    public function import()
    {
      return view('maps.test');
    }

    public function postimport()
    {
        Excel::load(Input::file('file'), function($reader){
          $reader->each(function($sheet){
            foreach ($sheet ->toArray() as $row) {
              Map::firstOrCreate($sheet->toArray());
            }
          });
        });
        return redirect()->route('maps.test');
    }

}
