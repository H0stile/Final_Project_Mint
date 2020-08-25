<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class MentorController extends Controller
{
    //
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        // if(Auth::user()->type == 'mentor') 

        $mentor = User::find($id);
        $skills = User::find($id)->skills;
        $ratings = User::find($id)->receiveRatings;


        /*
            $mentee_info = DB::table('users')
            ->join('ratings', 'ratings.writer_id', '=', 'users.id')
            ->select('users.*')
            ->where('users.id', '=', $ratings->writer_id) 
            ->get();
            */

        $ratingExists = False;
        //$ratingsWithName=collect([['check','5','check collect Comment']]);
        $ratingsWithName = collect();
        foreach ($ratings as $rating) {
            // Create an array containing rater_name, rating, comments
            // $rater = User::find($rating->writer_id);

            $rater = User::find($rating->writer_id);
            $raterName = $rater->firstname;
            $ratingsWithName->push([$raterName, $rating->score, $rating->comment]);


            // Checking if the mentee has already rated the mentor 
            if (($rating->writer_id == Auth::user()->id) && ($rating->target_id == $id)) {
                $ratingExists = True;
            }
        }

        //Check mentor availability
        if ($mentor->availability == 1) {
            $mentorAvailable = 'Yes';
        } else {
            $mentorAvailable = 'No';
        }
        // dd($ratingsWithName);

        //dd($mentor->firstname);
        //dd($skills);
        //dd($ratings);
        //dd(Auth::user()->id);
        //dd($ratingExists);
        //return view('mentor', ['mentor' => $mentor],['skills' => $skills],['ratings' => $ratings]);   
        return view('mentor', compact('mentor', 'skills', 'ratingExists', 'ratingsWithName', 'mentorAvailable'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //inserting score and comments into db table ratings
    public function store(Request $request)
    {
        DB::table('ratings')->insert([
            'writer_id' => $request->writer_id,
            'target_id' => $request->target_id,
            'score' => $request->score,
            'comment' => $request->comment,
        ]);
        //  return redirect("/mentorprofile/$request->id");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $mentor = User::find($id);
        return view('editmentorprofile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        // $result = DB::delete('DELETE FROM users WHERE id = ? ', [$id]);


        $result = User::find($id);
        $result->delete();
        return response()->json(['message' => 'hellooooo' . $id]);

        // if ($result)
        //     return response()->json(['message' => 'user(id:' . $id . ') destroyed']);
        // else
        //     return response()->json(['message' => 'Impossible to destroy the user with id : ' . $id]);
    }
}
