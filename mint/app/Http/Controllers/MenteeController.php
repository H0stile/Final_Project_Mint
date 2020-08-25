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
        if ($profile === null) {
            return redirect('home');
        }
        $loggedInUser = Auth::user();

        $messageUserIds = [$id, $loggedInUser->id];
        $messages = Message::whereIn('writer_id', $messageUserIds, 'and')
            ->whereIn('target_id', $messageUserIds)->get();

        $collabRequestStatus = null;
        $collabRequestId = null;
        if (Auth::user()->type === 'mentor') {
            $mentee = Auth::user()->mentees->find($id);
            $collabRequestStatus = $mentee->pivot->status_rqs;
            $collabRequestId = $mentee->pivot->id;
        }

        return view(
            'mentee/profile',
            [
                'profile' => $profile,
                'messages' => $messages,
                'collabRequestStatus' => $collabRequestStatus,
                'collabRequestId' => $collabRequestId,
            ]
        );
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin');
    }
}
