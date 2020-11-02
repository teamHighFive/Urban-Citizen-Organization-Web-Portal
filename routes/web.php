<?php

use Facade\FlareClient\Http\Response;
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

/*
|--------------------------------------------------------------------------
| Web Routes by Sandali START
|--------------------------------------------------------------------------
*/
/// Create, Join, Schedule meetings
Route::get('/online-conferences', function () {
    return view('onlineConferences');
});

Route::post('/meeting-create-and-join', 'MeetingController@createAndJoin');

Route::post('/meeting-schedule', 'MeetingController@schedule');

/// View upcoming meetings
Route::get('/view-meetings', 'MeetingController@viewMeetings');

Route::get('/join-details/{meeting_id}', 'MeetingController@joinDetails');

Route::post('/meeting-join-pwd', function (Request $request) {

    $user = $request->user;
    $userType = $request->userType;
    $meetingID = $request->meetingID;

    return view('getPwd')->with('user', $user)->with('userType', $userType)->with('meetingID', $meetingID);
});

Route::post('/meeting-join', 'MeetingController@joinViaCalendar');

/// View meetings pending for admin approval
Route::get('/admin-approval', 'MeetingController@viewMeetingsPendingForAdminApproval');

Route::get('/approve-meeting/{meeting_id}', 'MeetingController@approveMeeting');

Route::get('/reject-meeting/{meeting_id}', 'MeetingController@rejectMeeting');

/*
|--------------------------------------------------------------------------
| Web Routes by Sandali END
|--------------------------------------------------------------------------
*/
/*


/*
|--------------------------------------------------------------------------
| Web Routes by Ruwanthi START
|--------------------------------------------------------------------------
*/
Route::get('/gallery', 'GalleryController@index');

Route::resource('gallery', 'GalleryController');

Route::resource('photo', 'PhotoController');

Route::get('/gallery/show/{id}', 'GalleryController@show');

Route::get('/photo/create/{id}', 'PhotoController@create'); 

Route::get('/photo/details/{id}', 'PhotoController@details');

Route::get('/test', function()
{
    return view('gallery.create');
});
Route::delete('/gallery/delete/{id}','GalleryController@destroy');


/*
|--------------------------------------------------------------------------
| Web Routes by Ruwanthi END
|--------------------------------------------------------------------------
*/