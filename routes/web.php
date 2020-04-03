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
})->name('gymowner');
Route::get('/student', function(){
    return view('student');
})->name('student');
Route::get('/aboutus', function(){
    return view('aboutus');
})->name('aboutus');
Route::get('/pricing', function(){
    return view('pricing');
})->name('pricing');
Route::middleware([ 'verified', 'auth', 'admin'])->group(function(){
    Route::get('/admin', 'AccountController@adminactivity')->name('adminmember_activity');
});
Route::middleware([ 'verified', 'auth', 'student'])->group(function(){
     // student
     Route::get('/account/student', 'AccountController@student')->name('student_account');
     Route::get('/account/student/viewgym/{gym_id}', 'GymController@gymview')->name('view_gym');
     Route::get('/account/student/gyms/search', 'GymController@search')->name('add_gym');
     Route::get('/account/student/gyms/cancel/{gym_id}', 'GymController@request_cancel')->name('request_cancel');
     Route::get('/account/student/gyms/access/{gym_id}', 'GymController@request_access')->name('request_access');
     Route::get('/account/student/video/{id}', 'VideoController@watch')->name('student_watch');
     Route::get('/account/student/playlist/{id}','PlaylistController@approved_videos')->name('student_playlist');
});

Route::group(['middleware'=>[ 'auth','verified', 'gymowner']], function(){
    //gymowner
    Route::get('/account/gymowner/{gym_id}/memberactivity', 'AccountController@gymactivity')->name('gymmember_activity');
    Route::get('/account/gymowner', 'AccountController@gymowner')->name('gymowner_account');
    Route::get('/account/gymowner/members', 'AccountController@members')->name('gymowner_members');
    Route::get('/account/gymowner/addvideo/{gym_id}', 'VideoController@addVideo')->name('add_video');
    Route::get('/account/gymowner/updatevideo/{id}', 'VideoController@update_video')->name('update_video');
    Route::get('/account/gymowner/deletevideo/{id}', 'VideoController@deleteVideo')->name('delete_video');
    Route::post('/account/gymowner/addvideo', 'VideoController@createVideo')->name('create_video');
    Route::put('/account/gymowner/updatevideo/{id}', 'VideoController@updateVideo')->name('updatevideo');
    Route::get('/account/gymowner/puhlishvideo/{id}', 'VideoController@publishVideo')->name('publish_video');
    Route::get('/account/gymowner/gym/myvideos/{gym_id}', 'GymController@gymvideos')->name('my_videos');
    Route::get('/account/gymowner/gym/video/{id}', 'VideoController@gymVideo')->name('myvideo');
    Route::get('/account/gymowner/members/aprove/{gym_id}/{user_id}', 'GymController@request_aprove')->name('request_aprove');
    Route::get('/account/gymowner/members/deny/{gym_id}/{user_id}', 'GymController@request_deny')->name('request_deny');
    Route::get('/getYoutube/{id}', 'VideoController@getYoutube')->name('get_youtube');
    Route::get('/account/gymowner/video/{id}', 'VideoController@watchgym')->name('watch_gym');
    Route::put('/account/gymowner/updategym/{gym_id}','GymController@updategym')->name('update_gym');
    Route::get('/account/gymowner/playlist/{id}','PlaylistController@videos')->name('gym_playlist');
});
Route::middleware(['verified', 'auth'])->group(function () {
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::put('/account/updateuser/{id}', 'AccountController@updateUser')->name('auth_update');

    // gymowner
    Route::get('/account/favorite/video/{id}', 'VideoController@favorite')->name('favorite');
    Route::get('/account/unfavorite/video/{id}', 'VideoController@unfavorite')->name('unfavorite');

    //Comment Route
    Route::post('/video/comment', 'CommentController@store')->name('Comemnt');

    //Playlist
    Route::get('/palylistautocomplete/{gym_id}','PlaylistController@autocomplete')->name('Autocomplete');
    
});
