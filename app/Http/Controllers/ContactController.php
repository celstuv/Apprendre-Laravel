<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function create(){
      return view('contact.create');
    }

    public function store(){
      // dd(request()->all()); // test du formulaire
      $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
      ]);

      MAIL::to('572a138c72-22b106@inbox.mailtrap.io')->send(new ContactMail($data));

      //1ere methode
      // session()->flash('message', 'Votre message a bien été envoyé.');

      //2eme methode
      return redirect('contact')->with('message', 'Votre message a bien été envoyé.');
    }
}
