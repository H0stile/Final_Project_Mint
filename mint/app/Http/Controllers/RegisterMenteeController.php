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
use Auth;


class RegisterMenteeController extends Controller
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
        $validatedData = $data->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'language' => ['required']
        ]);

        $user = new User([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_image' => 'defaultProfileLogo.png',
            'type' => 'mentee'
        ]);



        $user->save();
        $user->languages()->sync($data['language']);
        return redirect('/login');
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
    public function index()
    {
        $languages = language::all();
        return view('register_mentee', ['languages' => $languages]);
    }

    //     public function test()
    //     {
    //         $user = Auth::user();
    //         $user->languages()->sync([1, 3]);
    //         dd($result);
    //     }
}
