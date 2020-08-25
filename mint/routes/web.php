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


// Jeyashree : Creating route to see the mentor profile page
Route::get('/mentorprofile/{id}', 'MentorController@show')->name('mentorprofile');
// Jeyashree : ajax call route to submit the comment by mentee to the mentor for one time
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

// creating navbar specifically for Mentor 
//Route::get('/mentorprofile/{id}', 'NavbarController@show');

Route::get('/', function () {
    return view('navbar');
});





//Route to connect the button on mentor page
//Route::get('/mentorac', 'MentorallconnectionController@index')>name('seeallconnection');



//Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/mentorac/{id}', 'MentorallconnectionController@index');
Route::get('/disconnect/{id}', 'MentorallconnectionController@destroy');

Route::get('/mentee/{id}', 'MenteeController@profile')->middleware('mentee.profile');


// ! Admin
Route::get('/admin', 'AdminController@index')->middleware('admin');
Route::put('/admin/update/{id}', 'AdminController@update');
Route::delete('/admin/decline/{id}', 'AdminController@destroy');
Route::get('/initSearch', 'AdminController@destroy');


Route::get('/mentee/{id}', 'MenteeController@profile');

//Route::get('/mentee/{id}', 'MenteeController@list');
Route::get('/mentorac/{id}', 'MentorallconnectionController@index');
Route::get('/mentoracdisconnect/{id}', 'MentorallconnectionController@destroy');

Route::get('/mentorai/{id}', 'MentorallinvitationController@index');
Route::get('/mentoraidecline/{id}', 'MentorallinvitationController@destroy');
Route::get('/mentoraiaccept/{id}', 'MentorallinvitationController@update');
