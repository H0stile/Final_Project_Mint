<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MenteeController extends Controller
{
    public function profile($id)
    {
        $profile = User::find($id);
        //dd($user);
        return view(
            'mentee/profile',
            [
                'profile' => $profile
            ]
        );
    }
}
