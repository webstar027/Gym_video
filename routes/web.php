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

Route::get('/gymowner', 'HomeController@gymowner')->name('gymowner');
Route::get('/student', 'HomeController@student')->name('student');
Route::get('/aboutus', 'HomeController@about')->name('aboutus');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');

// gymowner
Route::get('/account/gymowner', 'AccountController@gymowner');
Route::get('/account/gymowner/members', 'AccountController@members');
Route::get('/account/gymowner/addvideo/{gym_id}', 'VideoController@addVideo');
Route::get('/account/gymowner/updatevideo/{id}', 'VideoController@update_video');
Route::get('/account/gymowner/deletevideo/{id}', 'VideoController@deleteVideo');
Route::post('/account/gymowner/addvideo', 'VideoController@createVideo');
Route::put('/account/gymowner/updatevideo/{id}', 'VideoController@updateVideo');
Route::put('/account/gymowner/puhlishvideo/{id}', 'VideoController@publishVideo');
Route::get('/account/gymowner/gym/myvideos/{gym_id}', 'GymController@gymvideos');
Route::get('/account/gymowner/gym/video/{id}', 'VideoController@gymVideo');

// student
Route::get('/account/student', 'AccountController@student');
Route::get('/account/student/gyms', 'AccountController@gymlist');
Route::get('/account/student/gyms/search', 'GymController@addgym');
// Route::get('/account/student/video/', 'VideoController@viewvideos');
Route::get('/account/student/video/{id}', 'VideoController@watch');