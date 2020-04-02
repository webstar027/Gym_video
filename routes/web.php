<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/gymowner', function(){
    return view('gymowner');
});
Route::get('/student', function(){
    return view('student');
});
Route::get('/aboutus', function(){
    return view('aboutus');
});
Route::get('/pricing', function(){
    return view('pricing');
});

Route::middleware([ 'verified', 'auth', 'student'])->group(function(){
     // student
     Route::get('/account/student', 'AccountController@student');
     Route::get('/account/student/viewgym/{gym_id}', 'GymController@gymview');
     Route::get('/account/student/gyms/search', 'GymController@search');
     Route::get('/account/student/gyms/cancel/{gym_id}', 'GymController@request_cancel');
     Route::get('/account/student/gyms/access/{gym_id}', 'GymController@request_access');
     Route::get('/account/student/video/{id}', 'VideoController@watch');
});

Route::group(['middleware'=>[ 'auth','verified', 'gymowner']], function(){
    //gymowner
    Route::get('/account/gymowner', 'AccountController@gymowner');
    Route::get('/account/gymowner/members', 'AccountController@members');
    Route::get('/account/gymowner/addvideo/{gym_id}', 'VideoController@addVideo');
    Route::get('/account/gymowner/updatevideo/{id}', 'VideoController@update_video');
    Route::get('/account/gymowner/deletevideo/{id}', 'VideoController@deleteVideo');
    Route::post('/account/gymowner/addvideo', 'VideoController@createVideo');
    Route::put('/account/gymowner/updatevideo/{id}', 'VideoController@updateVideo');
    Route::get('/account/gymowner/puhlishvideo/{id}', 'VideoController@publishVideo');
    Route::get('/account/gymowner/gym/myvideos/{gym_id}', 'GymController@gymvideos');
    Route::get('/account/gymowner/gym/video/{id}', 'VideoController@gymVideo');
    Route::get('/account/gymowner/members/aprove/{gym_id}/{user_id}', 'GymController@request_aprove');
    Route::get('/account/gymowner/members/deny/{gym_id}/{user_id}', 'GymController@request_deny');
    Route::get('/getYoutube/{id}', 'VideoController@getYoutube');
    Route::get('/account/gymowner/video/{id}', 'VideoController@watchgym');
    Route::put('/account/gymowner/updategym/{gym_id}','GymController@updategym');
});
Route::middleware(['verified', 'auth'])->group(function () {
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::put('/account/updateuser/{id}', 'AccountController@updateUser')->name('auth');

    // gymowner
    Route::get('/account/favorite/video/{id}', 'VideoController@favorite');
    Route::get('/account/unfavorite/video/{id}', 'VideoController@unfavorite');

    //Comment Route
    Route::post('/video/comment', 'CommentController@store')->name('Comemnt');

    //Playlist
    Route::get('/palylistautocomplete/{gym_id}','PlaylistController@autocomplete')->name('Autocomplete');
});
