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

//Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/mentorac/{id}', 'MentorallconnectionController@index');
Route::get('/mentoracdisconnect/{id}', 'MentorallconnectionController@destroy');

Route::get('/mentorai/{id}', 'MentorallinvitationController@index');
Route::get('/mentoraidecline/{id}', 'MentorallinvitationController@destroy');
Route::get('/mentoraiaccept/{id}', 'MentorallinvitationController@edit');