<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function Search($datefrom, $dateto)
{
    $query = "Select * FROM maps where date between";

    if (isset($date_from)) {
        if (!empty($date_from))
        {
            $query .= " '".$datefrom."'";
        }
    }

    if (isset($date_to)) {
        if (!empty($date_to)) 
        {
            $query .= " and '".$dateto."'";
        }
    }

    $data = DB::connection('maps')->select($query);
    return view('maps.index', ['maps' => $data]);;
}
}
