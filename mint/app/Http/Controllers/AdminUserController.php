<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function show($id)
    {  
        $profile = User::where('id', $id)->first();
        if ($profile->type === 'mentee'){
            return view('mentee/profile', compact('profile'));
        }   
    }
}
