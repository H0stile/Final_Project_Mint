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
        $mentors = User::where('type', 'mentor')->where('mentor_status', 'validate')->where('users.availability', true)->get();
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

        if ($lang != null || $skill != null || $name != null) {
            $conditions = array(
                array('users.mentor_status', 'validate'),
                array('users.type', 'mentor'),
                array('users.availability', true),
                // array('users.languages', 'like', '%'.$lang.'%'),
                // array('skill', 'like', '%'.$skill.'%'),
                // array('lastname', 'like', '%'.$name.'%'),
            );
            $users = user::where($conditions)->get();
            $mentorsData = array();
            foreach ($users as $user) {
                $userData = array(
                    'Id' => $user->id,
                    'profile_image' => $user->profile_image,
                    'Name' => $user->firstname." ".$user->lastname,
                    'Language' => $user->languages,
                    'Rating' => intval(DB::table('ratings')->select('score')->where('target_id', $user->id)->avg('score')),
                    'Skills' => $user->skills,
                );
                array_push($mentorsData, $userData);
            }
            // dd($mentorsData);
            return response()->json([$users]);
            // return response()->json([$mentorsData]);
        }else{
            $conditions = array(
                array('users.mentor_status', 'validate'),
                array('users.type', 'mentor'),
                array('users.availability', true),
            );
            $users = user::where($conditions)->get();
            $mentorsData = array();
            foreach ($users as $user) {
                $userData = array(
                    'Id' => $user->id,
                    'profile_image' => $user->profile_image,
                    'Name' => $user->firstname." ".$user->lastname,
                    'Language' => $user->languages,
                    'Rating' => intVal(DB::table('ratings')->select('score')->where('target_id', $user->id)->avg('score')),
                    'Skills' => $user->skills,
                );
                array_push($mentorsData, $userData);
            }
            return response()->json([$mentorsData]);
        }
    }
    // public function getAllRateByMentor($id){
    //     $mentorRating = DB::table('ratings')->select('score')->where('target_id', $id)->avg('score');
    //     return response()->json(['rating' => intVal($mentorRating)]);
    // }
}