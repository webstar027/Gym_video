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
Auth::routes(['verify' => true]);

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/gymowner', 'HomeController@gymownerpage')->name('gymowner');
Route::get('/student', 'HomeController@studentpage')->name('student');
Route::get('/aboutus', 'HomeController@about')->name('aboutus');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');

// gymowner
Route::get('/account/gymowner', 'AccountController@gymowner')->middleware('auth');;
Route::get('/account/gymowner/members', 'AccountController@members')->middleware('auth');;
Route::get('/account/gymowner/addvideo/{gym_id}', 'VideoController@addVideo')->middleware('auth');;
Route::get('/account/gymowner/updatevideo/{id}', 'VideoController@update_video')->middleware('auth');;
Route::get('/account/gymowner/deletevideo/{id}', 'VideoController@deleteVideo')->middleware('auth');;
Route::post('/account/gymowner/addvideo', 'VideoController@createVideo')->middleware('auth');;
Route::put('/account/gymowner/updatevideo/{id}', 'VideoController@updateVideo')->middleware('auth');;
Route::get('/account/gymowner/puhlishvideo/{id}', 'VideoController@publishVideo')->middleware('auth');;
Route::get('/account/gymowner/gym/myvideos/{gym_id}', 'GymController@gymvideos')->middleware('auth');;
Route::get('/account/gymowner/gym/video/{id}', 'VideoController@gymVideo')->middleware('auth');;
Route::post('/getyoutube','VideoController@getYoutube');
// student
Route::put('/account/updateuser/{id}', 'AccountController@updateUser')->name('auth');
Route::get('/account/student', 'AccountController@student')->middleware('auth');;
Route::get('/account/student/viewgym/{gym_id}', 'GymController@gymview')->middleware('auth');;
Route::get('/account/student/gyms/search', 'GymController@search')->middleware('auth');;
// Route::get('/account/student/video/', 'VideoController@viewvideos');
Route::get('/account/student/video/{id}', 'VideoController@watch')->middleware('auth');
