<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index');





//* Charles : routes used for register forms
Route::get('/register_mentor', 'Auth\RegisterMentorController@index');
Route::get('/register_mentee', 'Auth\RegisterMenteeController@index');
Route::get('/register_mentor_skill', 'Auth\RegisterMentorController@initSkill');
//Route::get('/test', 'Auth\RegisterMenteeController@test');
Route::post('/register_mentee', 'Auth\RegisterMenteeController@validator')->name('register.mentee');
Route::post('/register_mentor', 'Auth\RegisterMentorController@validator')->name('register.mentor');
//Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Jeyashree : ajax call route to submit the comment by mentee to the mentor for one time
Route::get('/mentor/{id}', 'MentorController@show')->name('mentorprofile')->middleware('mentorprofile')->middleware('auth');
Route::post('/mentor/{id}', 'MentorController@store')->middleware('auth');
// Jeyashree :to delete the mentor profile from the database by admin
Route::delete('/mentor/delete/{id}', 'MentorController@destroy')->middleware('auth');


//  Jeyashree: to show the mentor profile in the form -which have to be edited
Route::get('/mentor/edit/{id}', 'editmentorprofileController@edit')->middleware('auth');
//  Jeyashree :to update the updated mentor profile into the database
Route::post('/mentor/edit/{id}', 'editmentorprofileController@update')->middleware('auth');
// Jeyashree :to delete the mentor profile from the database by himself
Route::delete('/mentor/delete/{id}', 'editmentorprofileController@destroy')->middleware('auth');


// Jeyashree :Apply for mentorship by pushing button in mentor profile and connects apply mentorship page data stored in collaboration table
Route::get('/mentor/apply/{id}', 'ApplymentorshipController@show')->name('applymentorship')->middleware('auth');
// Jeyashree : ajax call route to submit the comment by mentee to the mentor for one time
Route::post('/mentor/apply/{id}', 'ApplymentorshipController@store')->middleware('auth');





// Route::get('/home', function () {
//     return view('layouts.navbar');
// });





//Route to connect the button on mentor page
//Route::get('/mentorac', 'MentorallconnectionController@index')>name('seeallconnection');

//Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/mentorac/{id}', 'MentorallconnectionController@index')->middleware('auth');
Route::get('/disconnect/{id}', 'MentorallconnectionController@destroy')->middleware('auth');


// Mentee routes
Route::get('/mentee/{id}', 'MenteeController@profile')
    ->name('mentee.profile')
    ->middleware('mentee.profile')->middleware('auth');
Route::delete('/mentee/{id}/destroy', 'MenteeController@destroy')
    ->name('mentee.destroy')
    ->middleware('admin')->middleware('auth');
Route::get('/mentee/edit/{id}', 'EditMenteeProfileController@edit')->name('editmenteeprofile')->middleware('mentee.profile')->middleware('auth');
Route::post('/mentee/edit/{id}', 'EditMenteeProfileController@update')->middleware('mentee.profile')->middleware('auth');
Route::delete('/mentee/delete/{id}', 'EditMenteeProfileController@destroy')->middleware('mentee.profile')->middleware('auth');


// ! Admin
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/userCollaborations/{id}', 'AdminController@getUserCollabs')->middleware('admin');
Route::put('/admin/update/{id}', 'AdminController@update')->middleware('admin');
Route::delete('/admin/decline/{id}', 'AdminController@destroy')->middleware('admin');
Route::get('/contactUser/{id}', 'SendEmailController@show')->middleware('admin');
Route::post('/contactUser', 'SendEmailController@store')->middleware('admin');


Route::get('/mentorac/{id}', 'MentorallconnectionController@index')->middleware('auth');
Route::get('/mentoracdisconnect/{id}', 'MentorallconnectionController@destroy')->name('mentor.connection.destroy')->middleware('auth');

Route::get('/mentorai/{id}', 'MentorallinvitationController@index')->middleware('auth');
Route::get('/mentoraidecline/{id}', 'MentorallinvitationController@destroy')->name('mentor.invitation.destroy')->middleware('auth');
Route::get('/mentoraiaccept/{id}', 'MentorallinvitationController@update')->name('mentor.invitation.accept')->middleware('auth');

Route::get('/jobs', 'JobsController@jobs')->middleware('auth');

//* Route for mentor all invitations - Matt
Route::get('/mentorai/', 'MentorallinvitationController@index')->middleware('auth');
// Route::get('/mentoraidecline/{id}', 'MentorallinvitationController@destroy');
// Route::get('/mentoraiaccept/{id}', 'MentorallinvitationController@update');

//* Route for mentor all Connections - Matt
Route::get('/searchmentor/{id}', 'searchmentorController@index')->name('searchmentor')->middleware('auth');
Route::get('/initSearchNames', 'searchmentorController@initName')->middleware('auth');
Route::get('/initSearchSkills', 'searchmentorController@initSkill')->middleware('auth');
Route::get('/initSearchLanguages', 'searchmentorController@initLanguage')->middleware('auth');
Route::get('/initSearchMentorData', 'searchmentorController@initMentorData')->middleware('auth');

// Rating routes
Route::post('/rating', 'RatingController@create')->name('rating.create')->middleware('auth');
Route::post('/message', 'MessageController@create')->name('message.create')->middleware('auth');
Route::get('/getRatingByMentor/{id}', 'searchmentorController@getAllRateByMentor')->middleware('auth');
