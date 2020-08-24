<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Http;

class MenteeController extends Controller
{
    public function profile($id)
    {
        $profile = User::find($id);
        //dd($profile);
        return view(
            'mentee/profile',
            [
                'profile' => $profile
            ]
        );
    }

    public function list()
    {
        return  Http::get('https://remotive.io/api/remote-jobs?limit=2')->body();
    }
}
