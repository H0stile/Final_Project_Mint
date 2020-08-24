<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


// Jeyashree : Creating route to see the mentor profile page
Route::get('/mentorprofile/{id}', 'MentorController@show');
// Jeyashree : ajax call route to submit the comment by mentee to the mentor for one time
Route::post('/mentorprofile/{id}', 'MentorController@store');
// Jeyashree :to delete the mentor profile from the database by admin
Route::delete('/mentorprofile/{id}', 'MentorController@destroy');
//  : to show the mentor profile in the form -which have to be edited
Route::get('/mentorprofile/edit/{id}', 'MentorController@edit'); 
//  :to update the updated mentor profile into the database
Route::post('/mentorprofile/update/{id}', 'MentorController@update'); 

// Jeyashree :Apply for mentorship by pushing button in mentor profile and connects apply mentorship page data stored in collaboration table
Route::get('/mentorprofile/apply/{id}', 'ApplymentorshipController@show');
// Jeyashree : ajax call route to submit the comment by mentee to the mentor for one time
Route::post('/mentorprofile/apply/{id}', 'ApplymentorshipController@store');
 

//Route to connect the button on mentor page
//Route::get('/mentorac', 'MentorallconnectionController@index')>name('seeallconnection');



