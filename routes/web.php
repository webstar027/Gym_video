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
Route::get('/account/member', 'AccountController@members');
Route::get('/gym/myvideos/{gymid}', 'VideoController@videos');
Route::get('/gym/video/{id}', 'VideoController@add');

// student
Route::get('/account/student', 'AccountController@student');
Route::get('/account/gyms', 'AccountController@gymlist');
Route::get('/gym/search', 'GymController@search');
Route::get('/video/search', 'VideoController@search');
Route::get('/video/{id}', 'VideoController@watch');