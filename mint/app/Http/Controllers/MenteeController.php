<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MenteeController extends Controller
{
    public function profile()
    {
        $profile = User::find(1);
        //dd($user);
        return view(
            'mentee/profile',
            [
                'profile' => $profile
            ]
        );
    }
}
