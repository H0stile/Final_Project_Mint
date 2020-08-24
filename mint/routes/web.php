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
Route::get('/mentorac/{id}', 'MentorallconnectionController@index');
Route::get('/disconnect/{id}', 'MentorallconnectionController@destroy');

// ! Admin
Route::get('/admin', 'AdminController@index')->middleware('admin');
Route::put('/admin/update/{id}', 'AdminController@update')->middleware('admin');
Route::delete('/admin/decline/{id}', 'AdminController@destroy')->middleware('admin');
Route::get('/mentee/{id}', 'MenteeController@profile');

//Route::get('/mentee/{id}', 'MenteeController@list');
