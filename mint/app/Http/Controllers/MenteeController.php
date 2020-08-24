<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MenteeController extends Controller
{
    public function profile($id)
    {
        $profile = User::find($id);
        $loggedInUser = Auth::user();

        $messageUserIds = [$id, $loggedInUser->id];
        $messages = Message::whereIn('writer_id', $messageUserIds, 'and')
            ->whereIn('target_id', $messageUserIds)->get();

        // $mentee = Auth::user()->mentees()->find($id);
        // dd($mentee->pivot->status_rqs);

        return view(
            'mentee/profile',
            [
                'profile' => $profile,
                'messages' => $messages,
            ]
        );
    }

    public function list()
    {
        return  Http::get('https://remotive.io/api/remote-jobs?limit=2')->body();
    }
}
