<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\GroupUse;

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
Route::middleware([ 'verified', 'auth'])->group(function(){
    Route::get('/admin/memberactivity', 'AccountController@adminactivity')->name('adminmemberactivity');
});
Route::middleware([ 'verified', 'auth', 'student'])->group(function(){
     // student
     Route::get('/account/student', 'AccountController@student')->name('studentaccount');
     Route::get('/account/student/viewgym/{gym_id}', 'GymController@gymview')->name('viewgym');
     Route::get('/account/student/gyms/search', 'GymController@search')->name('addgym');
     Route::get('/account/student/gyms/cancel/{gym_id}', 'GymController@request_cancel')->name('request_cancel');
     Route::get('/account/student/gyms/access/{gym_id}', 'GymController@request_access')->name('request_access');
     Route::get('/account/student/video/{id}', 'VideoController@watch')->name('studentwatch');
     Route::get('/account/student/playlist/{id}','PlaylistController@approved_videos')->name('studentplaylist');
});

Route::group(['middleware'=>[ 'auth','verified', 'gymowner']], function(){
    //gymowner
    Route::get('/account/gymowner/{gym_id}/memberactivity', 'AccountController@gymactivity')->name('gymmemberactivity');
    Route::get('/account/gymowner', 'AccountController@gymowner')->name('gymowneraccount');
    Route::get('/account/gymowner/members', 'AccountController@members')->name('gymownermembers');
    Route::get('/account/gymowner/addvideo/{gym_id}', 'VideoController@addVideo')->name('addnewvideo');
    Route::get('/account/gymowner/updatevideo/{id}', 'VideoController@update_video')->name('update_video');
    Route::get('/account/gymowner/deletevideo/{id}', 'VideoController@deleteVideo')->name('deletevideo');
    Route::post('/account/gymowner/addvideo', 'VideoController@createVideo')->name('createvideo');
    Route::put('/account/gymowner/updatevideo/{id}', 'VideoController@updateVideo')->name('updateVideo');
    Route::get('/account/gymowner/puhlishvideo/{id}', 'VideoController@publishVideo')->name('updateVideo');
    Route::get('/account/gymowner/gym/myvideos/{gym_id}', 'GymController@gymvideos')->name('myvideos');
    Route::get('/account/gymowner/gym/video/{id}', 'VideoController@gymVideo')->name('myvideos');
    Route::get('/account/gymowner/members/aprove/{gym_id}/{user_id}', 'GymController@request_aprove')->name('request_aprove');
    Route::get('/account/gymowner/members/deny/{gym_id}/{user_id}', 'GymController@request_deny')->name('request_deny');
    Route::get('/getYoutube/{id}', 'VideoController@getYoutube')->name('getYoutube');
    Route::get('/account/gymowner/video/{id}', 'VideoController@watchgym')->name('watchgym');
    Route::put('/account/gymowner/updategym/{gym_id}','GymController@updategym')->name('updategym');
    Route::get('/account/gymowner/playlist/{id}','PlaylistController@videos')->name('gymplaylist');
});
Route::middleware(['verified', 'auth'])->group(function () {
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::put('/account/updateuser/{id}', 'AccountController@updateUser')->name('auth');

    // gymowner
    Route::get('/account/favorite/video/{id}', 'VideoController@favorite')->name('favorite');
    Route::get('/account/unfavorite/video/{id}', 'VideoController@unfavorite')->name('unfavorite');

    //Comment Route
    Route::post('/video/comment', 'CommentController@store')->name('Comemnt');

    //Playlist
    Route::get('/palylistautocomplete/{gym_id}','PlaylistController@autocomplete')->name('Autocomplete');
    
});
