<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$admin = User::where('type','=','admin')->first();
        $admin = Auth::user();
        $matchMentor = ['type' => 'mentor', 'mentor_status' => 'pending'];
        $pendingMentors = User::where($matchMentor)->paginate(2);
        //$mentorMentee = ['type' => 'mentee', 'mentor_status' => 'validate'];
        $mentorMenteeList = User::where('type', 'mentee')->orWhere('mentor_status','validate')->get();
        for ($i=0; $i < $mentorMenteeList->count(); $i++) {
            $userCollaborators[$i] = $mentorMenteeList[$i]->mentees;
        }
        


        return view('admin', compact('pendingMentors', 'admin', 'mentorMenteeList','userCollaborators'));
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
        User::where('id', $id)
          ->update(['mentor_status' => 'validate']);
          return redirect('/admin')
          ->with('message', 'mentor validated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $getIdMentor = User::find($request->id);
        $getIdMentor->delete();

        //User::destroy($request->id);

        return redirect('/admin');
    }

    /**
     * Get User collaborators.
     *
     * 
     * 
     */
    public function getUserCollabs($userId){
        $user = User::find($userId);
        
        if ($user->type === "mentor"){
            $menteeTable = $user->mentees;
            if (count($menteeTable) != 0){
                return $menteeTable;
            }else{
                return $user->id;
            }
                
        }
        if ($user->type === "mentee"){
            
            $mentorTable = $user->mentors;
            if (count($mentorTable!= 0)){
                return $mentorTable;
            }else{
                return $user->id;
            }
        }  
    } 
}
