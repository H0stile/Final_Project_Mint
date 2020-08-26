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

        $collaborator = null;
        $collabRequestStatus = null;
        $collabRequestId = 0;
        $jobsData = [];
        $canWriteRating = false;

        if ($loggedInUser->type === 'mentor') {
            $collaborator = $loggedInUser->mentees->find($id);
            $collabRequestStatus = $collaborator->pivot->status_rqs;
            $collabRequestId = $collaborator->pivot->id;

            $ratings = $loggedInUser->sendRatings->where('target_id', $id);
            $canWriteRating = (count($ratings) == 0) && $collabRequestStatus == 'connected';
        } else if ($loggedInUser->type === 'mentee') {
            $collaborators = $loggedInUser->mentors;
            if (count($collaborators) > 0) {
                // Assuming that mentee can have just one mentor
                $collaborator = $collaborators[0];
            }
            $jobsData = Http::get('https://remotive.io/api/remote-jobs?limit=5')->json();
            $jobsData = $jobsData['jobs'];
        }

        $messageUserIds = [$loggedInUser->id];
        if ($collaborator !== null) {
            $messageUserIds[] = $collaborator->id;
        }
        $messages = Message::whereIn('writer_id', $messageUserIds, 'and')
            ->whereIn('target_id', $messageUserIds)->get();

        return view(
            'mentee/profile',
            [
                'profile' => $profile,
                'messages' => $messages,
                'collabRequestStatus' => $collabRequestStatus,
                'collabRequestId' => $collabRequestId,
                'jobsData' => $jobsData,
                'collaborator' => $collaborator,
                'canWriteRating' => $canWriteRating,
            ]
        );
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin');
    }
}
