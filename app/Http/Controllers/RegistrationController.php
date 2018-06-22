<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Registration;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;

class RegistrationController extends Controller
{
    public function index(Request $request){

      $registrations = Registration::where(function($query) use ($request){
        if(($search = $request->get('search'))) {
          $query->orWhere('name', 'like', '%' . $search . '%');
          $query->orWhere('surname', 'like', '%' . $search . '%');
          $query->orWhere('mac_address', 'like', '%' . $search . '%');
          $query->orWhere('phone', 'like', '%' . $search . '%');
        }
      })
    	->paginate(5);

    	return view('registrations.index',compact('registrations'));
    }

    public function create(){
    	return view('registrations.create');
    }


    public function store(Request $request){

      $rules = [
        'name' => ['required'],
        'surname' => ['required'],
        'mac_address' => ['required','min:17','max:17','unique:registrations'],
        'phone' => ['between:9,12'],
      ];

      $this->validate($request,$rules);

      $mac_address = $request->input('mac_address');

      $registration = Registration::create($request->all());

      $id = $registration->id;

		return redirect('registration/create') -> with("message","Thank for registration your device, your device ID : ".$id);
    }

    public function destroy($id){


    	$registration = Registration::find($id)
    			->delete();

    	return redirect('registration');
    }

    public function edit($id){

    	$registration = Registration::find($id);

    	return view('registrations.edit', compact('registration',$registration));

    }

    public function update(Request $request, $id){

    	$registration = Registration::find($id);

      $rules = [
        'name' => ['required'],
        'surname' => ['required'],
        'mac_address' => ['required','min:17','max:17'],
        'phone' => ['between:9,11'],
      ];

      $this->validate($request,$rules);

      $registration = Registration::create($request->all());

    	return redirect('registration') -> with("message","Your contact details has been changed");

    }
}
