<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;
use App\Charts\UserChart;
use Illuminate\Support\Facades\DB;
use App\Message;

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
        $pendingMentors = User::where($matchMentor)->get();
        //$mentorMentee = ['type' => 'mentee', 'mentor_status' => 'validate'];
        $mentorMenteeList = User::where('type', 'mentee')->orWhere('mentor_status','validate')->get();
        
        for ($i=0; $i < $mentorMenteeList->count(); $i++) {
            $userCollaborators[$i] = $mentorMenteeList[$i]->mentees;
        }
        /////////
        //chartUserRegister
        ////////

        $users = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $chart = new UserChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('New User Register Chart', 'line', $users)->options([
        'fill' => 'true',
        'borderColor' => '#51C1C0'
        ]);

        /////////
        //chartUserRegister
        ////////
     

        $userNumber = User::where('mentor_status', 'validate')->count();
        $pendingReqCount = User::where('mentor_status', 'pending')->count();  
        
        $messages = Message::count();


        return view('admin', compact('messages','pendingReqCount','userNumber','pendingMentors','chart', 'admin', 'mentorMenteeList','userCollaborators'));
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
        
            $mentor = User::where('id', $id)
          ->update(['mentor_status' => 'validate']);

          if ($mentor) {
              $mentor=User::find($id);
            //request()->validate(['email' => 'required|email']);

            $mentoremail = $mentor->email;
            $mentorname = $mentor->firstname . " " . $mentor->lastname;

            Mail::to($mentoremail)->send(new ContactMe($mentorname));
        
            return redirect('/admin')->with('message', 'mentor validated');
        };
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
            if (count($mentorTable)!= 0){
                return $mentorTable;
            }else{
                return $user->id;
            }

        }  
    } 
}
