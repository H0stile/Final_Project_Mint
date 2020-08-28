<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\ContactMe;

class SendEmailController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $username = $user->firstname;
        return view('contactUser', compact('user'));
    }
    public function store(){

        request()->validate(['email' => 'required|email']);

        //$email = request('email');
        $text = request('text');
        //dd($text);
        
        Mail::raw($text, function($message){
            $message->to(request('email'))
            ->subject('Hello');
        });
        
        return redirect('/admin');
          
    }
}

