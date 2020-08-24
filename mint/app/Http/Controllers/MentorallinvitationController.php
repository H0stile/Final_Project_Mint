<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collaboration;
use App\User;

class MentorallinvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $id = Auth::user()->id; //TODO solve this creating a user for me as mentor and try with login
        $menteeRequests = Collaboration::where('status_rqs', 'pending')->where('mentor_id', $id)->get();
        return view('mentorAllInvitation', ['menteeRequests' => $menteeRequests]);
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
        $acceptCollab = Collaboration::find($id);
        $acceptCollab->status_rqs = "connected";
        // return response()->json($acceptCollab);
        $acceptCollab->save();
        return response()->json(['msg'=>"Invitation accepted for $id"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $declineCollab = Collaboration::find($id);
        $declineCollab->delete();
        if ($declineCollab) {
            return response()->json(['msg'=>"Invitation decline for $id"]);
        }else{
            return response()->json(['msg'=>'Something wrong happened, Invitation decline not worked']);
        }
    }
}
