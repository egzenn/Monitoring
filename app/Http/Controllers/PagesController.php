<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getHome(){
    	return view('pages.home');
    }
    public function getMap(){
    	return view('pages.map');
    }
    public function getAdmin(){
    	return view('users.login');
    }

}
