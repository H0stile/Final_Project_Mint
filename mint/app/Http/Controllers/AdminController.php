<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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

       
        $admin = User::where('type','=','admin')->first();
        $matchMentor = ['type' => 'mentor', 'mentor_status' => 'pending'];
        $pendingMentors = User::where($matchMentor)->paginate(2);
        //dd($pendingMentor);
        
        return view('admin', compact('pendingMentors', 'admin'));
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
    public function destroy(Request $request)
    {
        $getIdMentor = User::find($request->id);
        $getIdMentor->delete();

        //User::destroy($request->id);

        return redirect('admin')/*->with([
            'status' => 'SUCCESS: Reported photo deleted successfully.',
            'class' => 'alert alert-success alert-dismissible fade show',
        ])*/;
    }
}
