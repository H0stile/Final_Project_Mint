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
//Jeyashree : to show the mentor profile  in the form -which have to be edited
Route::get('/mentorprofile/edit/{id}', 'MentorController@edit'); 
// Jeyashree :to update the updated mento profile into the database
Route::post('/mentorprofile/update/{id}', 'MentorController@update'); 

 

//Route to connect the button on mentor page
//Route::get('/mentorac', 'MentorallconnectionController@index')>name('seeallconnection');



