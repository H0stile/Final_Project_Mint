<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Language;
use App\Skill;
use Auth;
use SebastianBergmann\Environment\Console;

class RegisterMentorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        //$this->middleware('guest', ['except' => 'logout']);
        //$this->middleware('ajax', ['only' => 'register']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(Request $data)
    {
        // return Validator::make($data, [
        //     'firstname' => ['required', 'string', 'max:255'],
        //     'lastname' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        //* Charles : my personal validator, i also added a constraint for the linkedin url
        $checker = str_contains($data['linkedin'], "linkedin.com/in/");
        if ($checker != FALSE) {
            $validatedData = $data->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'pitch' => ['required'],
                'language' => ['required'],
                'linkedin' => ['required'],
                'skills' => ['required']
            ]);
            //* Charles : I'll create those fields in my DB
            $user = new User([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'pitch' => $data['pitch'],
                'linkedin' => $data['linkedin'],
                'type' => 'mentor',
                'mentor_status' => 'pending',
            ]);
            //* Charles : here i sync my DB with the languages and the skills (need to do that since they are intermediate tables)
            $user->save();
            $user->languages()->sync($data['language']);

            //* Explode and send id ?
            $resultID = explode(' - ', $data['skills']);

            $user->skills()->sync($resultID[0]);

            //sleep(5);
            //TODO Charles : Ask for a redirection message, it doesnt seems to work
            return redirect('/home')->with('message', 'Wait for the admin validation !');
        } else {
            return redirect()->back()->withErrors('Put a valid linkedin account !');
        }
    }
    //* Charles : part used by the ajax call to retrieve the skills from DB and put them in autocomplete
    public function initSkill()
    {
        $skills = Skill::all();
        return response()->json([$skills]);
    }
    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    // protected function create(Request $data)
    // {
    //         /*return User::create([
    //             'firstname' => $data['firstname'],
    //             'lastname' => $data['lastname'],
    //             'email' => $data['email'],
    //             'password' => Hash::make($data['password']),
    //             'linkedin' => $data['linkedin'],
    //             'pitch' => $data['pitch'],
    //             'language' => $data['language'],
    //             'skills' => $data['skills'],
    //             'type' => 'mentor',
    //             'mentor_status' => 'pending',
    //         ]);*/

    //         $user = new User([
    //             'firstname' => $data['firstname'],
    //             'lastname' => $data['lastname'],
    //             'email' => $data['email'],
    //             'password' => Hash::make($data['password']),
    //             'type' => 'mentee',
    //             'mentor_status' => 'validate',
    //         ]);



    //             $user->save();
    //         $user->languages()->sync($data['language']);

    //         return $user;


    //     }
    //* Charles : to display checkboxes
    public function index()
    {
        $languages = language::all();
        return view('register_mentor', ['languages' => $languages]);
    }

    //     public function test()
    //     {
    //         $user = Auth::user();
    //         $user->languages()->sync([1, 3]);
    //         dd($result);
    //     }
}
