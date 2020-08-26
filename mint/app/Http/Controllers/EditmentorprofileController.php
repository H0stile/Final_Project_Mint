<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Language;
use App\Skill;

class EditmentorprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    // public function mentorskill()
    // {
    //     $skills = Skill::all();
    //     return response()->json([$skills]);
    // }
    // public function mentorlanguages()
    // {
    //     $languages = language::all();
    //     return view('register_mentor', ['languages' => $languages]);
    // }


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
        //  $skills = User::find($id)->skills;
        $allskills =
            $skills = User::find($id)->skills;
        $languages = language::all();
        // $languages = language::find($id)->languages;
        //dd($mentor);
        //dd($skills);

        // dd($languages)


        if ($mentor->availability == 1) {
            $mentorAvailable = 'Yes';
        } else {
            $mentorAvailable = 'No';
        }

        // return view('editmentorprofile', compact('mentor', 'skills');
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
