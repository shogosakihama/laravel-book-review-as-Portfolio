<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
      return view('mailForm');
    }

    public function confirm(ContactRequest $request){
      
      $contact = $request->all();
      $request->session()->regenerateToken();
      return view('confirm',$contact);
    }

    public function sent(ContactRequest $request){

      $contact = $request->all();
      if($request->action === 'back'){
        return redirect()->route('contact')->withInput($contact);
      }

      $request->session()->regenerateToken();
      \Mail::to('goshalways@gmail.com')->send(new Contact($contact));
        return view('/thanks');
    }
}
