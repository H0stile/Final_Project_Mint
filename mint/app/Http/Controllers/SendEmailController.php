<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\User;

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

        $email = request('email');

        Mail::raw('It works!', function($message){
            $message->to(request('email'))
            ->subject('Hello There');
        });
        

        return redirect('/admin');
          
    }
}

