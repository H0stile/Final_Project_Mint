<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Language;
use App\Skill;
use Illuminate\Support\Facades\DB;

class EditMenteeProfileController extends Controller
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
        $profile = User::find($id);

        $languages = User::find($id)->languages;
        $allLanguages =  Language::all();
        $langChosen = collect();


        foreach ($allLanguages as $lang) {
            $chosen = false;
            foreach ($languages as $menteeLang) {
                if ($lang->id == $menteeLang->id) {
                    $chosen = true;
                }
            }
            $langChosen->push(['id' => $lang->id, 'language' => $lang->languages, 'chosen' => $chosen]);
        }

        return view('editmenteeprofile', compact('profile', 'languages', 'langChosen'));
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
        DB::table('users')->where('id', $id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'linkedin' => $request->linkedin,
            'pitch' => $request->pitch
        ]);

        DB::table('languages_intermediate')->where('user_id', $id)->delete();
        foreach ($request->langChkBox as $langId) {
            DB::table('languages_intermediate')->insert([
                'user_id' => $request->id,
                'language_id' => $langId
            ]);
        }

        return redirect("/mentee/" . $request->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::find($id);
        $result->delete();
    }
}
