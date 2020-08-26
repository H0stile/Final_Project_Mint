<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Collaboration;
use App\User;
use App\Skill;
use App\Language;

class searchmentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('searchmentor/searchmentor');
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
        //
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
    public function initName()
    {
        $mentors = User::where('type', 'mentor')->get();
        return response()->json([$mentors]);
    }
    public function initSkill()
    {
        $skills = Skill::all();
        return response()->json([$skills]);
    }
    public function initLanguage()
    {
        $languages = Language::all();
        return response()->json([$languages]);
    }
    public function initMentorData(request $request)
    {
        $lang = $request->lang;
        $skill = $request->skill;
        $name = $request->name;
        //TODO USE A WHERE CONDITION USING ARRAY TO FACILITATE THE QUERY >> https://stackoverflow.com/questions/30706603/can-i-do-model-whereid-array-multiple-where-conditions/61722255#61722255
        if ($lang != null || $skill != null || $name != null) {
            $mentorsData = DB::table('users')->join('skills_intermediate', 'skills_intermediate.user_id', '=', 'users.id')->join('skills', 'skills.id', '=', 'skills_intermediate.skill_id')->join('languages_intermediate', 'languages_intermediate.user_id', '=', 'users.id')->join('languages', 'languages.id', '=', 'languages_intermediate.language_id')->where('users.mentor_status', 'validate')->where('users.type', 'mentor')->where('languages', 'like', '%'.$lang.'%')->where('skill', 'like', '%'.$skill.'%')->get();
            //* ->where('users.firstname', 'like', '=', '%'.$name.'%')->where('users.lastname', 'like', '=', '%'.$name.'%')
            return response()->json([$mentorsData]);
            
            // return response()->json(['lang' => $lang, 'skill' => $skill, 'name' => $name ]);
        }else{
            $mentorsData = DB::table('users')->join('skills_intermediate', 'skills_intermediate.user_id', '=', 'users.id')->join('skills', 'skills.id', '=', 'skills_intermediate.skill_id')->join('languages_intermediate', 'languages_intermediate.user_id', '=', 'users.id')->join('languages', 'languages.id', '=', 'languages_intermediate.language_id')->where('users.mentor_status', 'validate')->where('users.type', 'mentor')->get();
            return response()->json([$mentorsData]);
        }
    }
    public function getAllRateByMentor($id){
        $mentorRating = DB::table('ratings')->select('score')->where('target_id', $id)->avg('score');
        return response()->json(['rating' => intVal($mentorRating)]);
    }
}