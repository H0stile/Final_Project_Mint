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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index');



//* Charles : email verification with materialize

//Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Jeyashree : ajax call route to submit the comment by mentee to the mentor for one time
Route::get('/mentorprofile/{id}', 'MentorController@show')->name('mentorprofile');
Route::post('/mentorprofile/{id}', 'MentorController@store');
// Jeyashree :to delete the mentor profile from the database by admin
Route::delete('/mentorprofile/delete/{id}', 'MentorController@destroy');


//  : to show the mentor profile in the form -which have to be edited
Route::get('/mentorprofile/edit/{id}', 'MentorController@edit');
//  :to update the updated mentor profile into the database
Route::post('/mentorprofile/update/{id}', 'MentorController@update');

// Jeyashree :Apply for mentorship by pushing button in mentor profile and connects apply mentorship page data stored in collaboration table
Route::get('/mentorprofile/apply/{id}', 'ApplymentorshipController@show')->name('applymentorship');
// Jeyashree : ajax call route to submit the comment by mentee to the mentor for one time
Route::post('/mentorprofile/apply/{id}', 'ApplymentorshipController@store');

// Route::get('/home', function () {
//     return view('layouts.navbar');
// });





//Route to connect the button on mentor page
//Route::get('/mentorac', 'MentorallconnectionController@index')>name('seeallconnection');

//Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/mentorac/{id}', 'MentorallconnectionController@index');
Route::get('/disconnect/{id}', 'MentorallconnectionController@destroy');


// Mentee routes
Route::get('/mentee/{id}', 'MenteeController@profile')
    ->name('mentee.profile')
    ->middleware('mentee.profile');
Route::delete('/mentee/{id}/destroy', 'MenteeController@destroy')
    ->name('mentee.destroy')
    ->middleware('admin');


// ! Admin
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::put('/admin/update/{id}', 'AdminController@update');
Route::delete('/admin/decline/{id}', 'AdminController@destroy');
Route::get('/initSearch', 'AdminController@destroy');

Route::get('/mentorac/{id}', 'MentorallconnectionController@index');
Route::delete('/mentoracdisconnect/{id}', 'MentorallconnectionController@destroy')->name('mentor.connection.destroy');

Route::get('/mentorai/{id}', 'MentorallinvitationController@index');
Route::get('/mentoraidecline/{id}', 'MentorallinvitationController@destroy')->name('mentor.invitation.accept');
Route::get('/mentoraiaccept/{id}', 'MentorallinvitationController@update')->name('mentor.invitation.accept');

Route::get('/jobs', 'JobsController@jobs');

Route::get('/searchmentor/{id}', 'searchmentorController@index')->middleware('mentee.profile');	
Route::get('/initSearchNames', 'searchmentorController@initName');	
Route::get('/initSearchSkills', 'searchmentorController@initSkill');	
Route::get('/initSearchLanguages', 'searchmentorController@initLanguage');	
Route::get('/initSearchMentorData', 'searchmentorController@initMentorData');

// Rating routes
Route::post('/rating', 'RatingController@create')->name('rating.create');
