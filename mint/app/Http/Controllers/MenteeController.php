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
        $collabRequestId = 0;
        $jobsData = [];

        if ($loggedInUser->type === 'mentor') {
            $mentee = $loggedInUser->mentees->find($id);
            $collabRequestStatus = $mentee->pivot->status_rqs;
            $collabRequestId = $mentee->pivot->id;
        } else if ($loggedInUser->type === 'mentee') {
            $jobsData = Http::get('https://remotive.io/api/remote-jobs?limit=5')->json();
            $jobsData = $jobsData['jobs'];
        }

        return view(
            'mentee/profile',
            [
                'profile' => $profile,
                'messages' => $messages,
                'collabRequestStatus' => $collabRequestStatus,
                'collabRequestId' => $collabRequestId,
                'jobsData' => $jobsData,
            ]
        );
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin');
    }
}
