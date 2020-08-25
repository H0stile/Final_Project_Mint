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

        //to chek if mentee and mentor connected
        //$mentee = Auth::user()->mentees->find($id);
        // $mentee = Auth::user()->mentees[0];
        //dd($mentee->pivot);
        //dd($mentee->pivot->status_rqs);

        return view(
            'mentee/profile',
            [
                'profile' => $profile,
                'messages' => $messages,
            ]
        );
    }
}
