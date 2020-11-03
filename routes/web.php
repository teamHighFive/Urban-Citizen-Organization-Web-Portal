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
// Main events view

/*Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);*/
Route::get('/event-calendar',  'IndexController@index');

// Show event model new view

Route::get('/add', ['uses' => 'EventController@add', 'as' => 'add']);

// Show event model view

Route::get('/event/{event}', ['uses' => 'EventController@show', 'as' => 'event.edit']);

// Route for create new event model

Route::post('/event', ['uses' => 'EventController@store', 'as' => 'event.store']);

// Route for update event model

Route::put('/event/{event}', ['uses' => 'EventController@update', 'as' => 'event.update']);

// Route for delete event model

Route::delete('/event/{event}', ['uses' => 'EventController@destroy', 'as' => 'event.destroy']);

// Get all events in json

Route::get('/events', ['uses' => 'EventController@events', 'as' => 'events']);
