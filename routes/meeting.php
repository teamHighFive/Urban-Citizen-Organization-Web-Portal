<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Meeting Routes
|--------------------------------------------------------------------------
|
| Here is where you can register meeting related routes. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/// Create, Join, Schedule meetings


/// View upcoming meetings
Route::get('/view-meetings', 'MeetingController@viewMeetings');

Route::get('/join-details/{meeting_id}', 'MeetingController@joinDetails');

Route::post('/meeting-join-pwd', function (Request $request) {

    $user = $request->user;
    $userType = $request->userType;
    $meetingID = $request->meetingID;

    return view('meeting.getPwd')->with('user', $user)->with('userType', $userType)->with('meetingID', $meetingID);
});

Route::post('/meeting-join', 'MeetingController@joinViaCalendar');

/// View meetings pending for admin approval
Route::get('/admin-approval', 'MeetingController@viewMeetingsPendingForAdminApproval');

Route::get('/approve-meeting/{meeting_id}', 'MeetingController@approveMeeting');

Route::get('/reject-meeting/{meeting_id}', 'MeetingController@rejectMeeting');
