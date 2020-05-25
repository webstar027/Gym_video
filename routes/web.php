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
Route::middleware(['auth','verified','admin'])->group(function(){
    Route::get('/adminactivity', 'AccountController@adminActivity')->name('adminmember_activity');
});
Route::middleware([ 'verified', 'auth', 'student'])->group(function(){
     // student
     Route::get('/account/student', 'AccountController@student')->name('student_account');
     Route::get('/account/student/account_details', 'AccountController@studentDetails')->name('student_details');
     Route::get('/account/student/viewgym/{gym_id}', 'GymController@gymView')->name('view_gym');
     Route::get('/account/student/gyms/search', 'GymController@search')->name('add_gym');
     Route::get('/account/student/gyms/cancel/{gym_id}', 'GymController@requestCancel')->name('request_cancel');
     Route::get('/account/student/gyms/access/{gym_id}', 'GymController@requestAccess')->name('request_access');
     Route::get('/account/video/{id}', 'VideoController@watch')->name('student_watch');
     Route::get('/account/student/playlist/{id}','PlaylistController@approvedVideos')->name('student_playlist');
});

Route::group(['middleware'=>[ 'auth','verified', 'gymowner']], function(){
    //gymowner
    Route::get('/account/gymowner/{gym_id}/memberactivity', 'AccountController@gymActivity')->name('gymmember_activity');
    Route::get('/account/gymowner', 'AccountController@gymOwner')->name('gymowner_account');
    Route::get('/account/gymowner/account_details', 'AccountController@gymOwnerDetails')->name('gymowner_details');
    Route::get('/account/gymowner/gym_details', 'AccountController@gymDetails')->name('gym_details');
    Route::get('/account/gymowner/members', 'AccountController@members')->name('gymowner_members');
    Route::get('/account/gymowner/addvideo/{gym_id}', 'VideoController@addVideo')->name('add_video');
    Route::get('/account/gymowner/updatevideo/{id}', 'VideoController@updateVideo')->name('update_video');
    Route::get('/account/gymowner/deletevideo/{id}', 'VideoController@deleteVideo')->name('delete_video');
    Route::post('/account/gymowner/addvideo', 'VideoController@createVideo')->name('create_video');
    Route::put('/account/gymowner/updatevideo/{id}', 'VideoController@updateVideoPost')->name('update_video_post');
    Route::get('/account/gymowner/puhlishvideo/{id}', 'VideoController@publishVideo')->name('publish_video');
    Route::get('/account/gymowner/gym/myvideos/{gym_id}', 'GymController@gymVideos')->name('my_videos');
    Route::get('/account/gymowner/gym/video/{id}', 'VideoController@gymVideo')->name('myvideo');
    Route::get('/account/gymowner/members/aprove/{gym_id}/{user_id}', 'GymController@requestAprove')->name('request_aprove');
    Route::get('/account/gymowner/members/deny/{gym_id}/{user_id}', 'GymController@requestDeny')->name('request_deny');
    Route::get('/getYoutube/{id}', 'VideoController@getYoutube')->name('get_youtube');
    Route::get('/account/gymowner/video/{id}', 'VideoController@watchGym')->name('watch_gym');
    Route::put('/account/gymowner/updategym/{gym_id}','GymController@updateGym')->name('update_gym');
    Route::get('/account/gymowner/playlist/{id}','PlaylistController@videos')->name('gym_playlist');
});
Route::middleware(['verified', 'auth'])->group(function () {
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::put('/account/updateuser/{id}', 'AccountController@updateUser')->name('auth_update');

    // gymowner
    Route::get('/account/favorite/video/{id}', 'VideoController@favorite')->name('favorite');
    Route::get('/account/unfavorite/video/{id}', 'VideoController@unFavorite')->name('unfavorite');

    //Comment Route
    Route::post('/video/comment', 'CommentController@store')->name('Comemnt');

    //Playlist
    Route::get('/palylistautocomplete/{gym_id}','PlaylistController@autoComplete')->name('Autocomplete');
    
    // Message Page
    Route::get('/message', "MessageController@index")->name("message");
    Route::get('/message/search/{userId}/{key}', "MessageController@search");
    Route::get('/message/get_history/{userId}/{clientId}', "MessageController@getHistory");
    Route::post("/message/send", "MessageController@send")->name("send");
    Route::get("/message/check_user/{clientId}", "MessageController@checkUser");
    Route::post("/message/read_all", "MessageController@readAll");
    Route::get("/message/get_all_realtime/{clientId}", "MessageController@getAllData");

});
