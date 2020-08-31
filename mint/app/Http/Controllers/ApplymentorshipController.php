<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Collaboration;



class ApplymentorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        //return('mentor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function show($id)
    {
        //
        $mentor = User::find($id);
        $skills = User::find($id)->skills;
        //dd(Auth::user()->id);


        $menteeId = Auth::user()->id;
        $mentorId = User::find($id)->id;

        $collab = Collaboration::where('mentor_id', $mentorId)
            ->where('mentee_id', $menteeId)->first();


        $writeMsg = false;
        if ($collab !== null) {
            if (($collab->mentee_id == Auth::user()->id) && ($collab->mentor_id == $id)) {
                $writeMsg = true;
            } else {
                $writeMsg = false;
            }
        }



        return view('applymentorship', compact('mentor', 'skills', 'writeMsg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::table('collaboration')->insert([
            'mentor_id' => $request->mentor_id,
            'mentee_id' => $request->mentee_id,
            'request_msg' => $request->request_msg,
            'status_rqs' => $request->status_rqs,
        ]);
        //return redirect("/mentorprofile/$request->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
