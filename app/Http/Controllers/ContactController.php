<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
      $contacts = Contact::orderBy('created_at', 'desc')->paginate(5);

      return view('contacts.index',['contacts' => $contacts]);
    }

    public function store(Request $request){

      $contact = Contact::create($request->all());

		return view('pages.home');
    }

    public function edit($id){

    	$contact = Contact::find($id);

    	return view('contacts.edit',['contact' => $contact]);

    }

    public function destroy($id){

      $contact = Contact::find($id)
          ->delete();

      return redirect('contact');
    }

    public function update(Request $request, $id){

      $contact = Contact::find($id);
      $name = $contact->name;
      $contact->status = "Answered";
      $contact->update();
      $language = $request->input('language');
      $answer = $request->input('answer');

      if($language == 'eng'){
        $type = 'emails/eng';
      } else if($language == 'pl' ){
        $type = 'emails/pl';
      }


      $data = [
        'name' => $name,
        'content' => $answer
      ];
      Mail::send($type,$data, function($message) use ($contact){
        $message->to($contact->email ,'Monitor Admin')->subject('Test emaila');
      });

    	return redirect('contact') -> with("message","You have answered the question and changed status");

    }
}
