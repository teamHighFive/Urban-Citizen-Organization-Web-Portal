<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Meeting;

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

Route::group(['middleware' => ['auth','isUser']], function () {
    /// Create, Join, Schedule meetings
    Route::get('/online-conferences', function () {
        return view('meeting.onlineConferences');
    });

    Route::post('/meeting-create-and-join', 'MeetingController@createAndJoin');
    Route::post('/meeting-schedule', 'MeetingController@schedule');

    /// View upcoming meetings

    Route::get('/join-details/{meeting_id}', 'MeetingController@joinDetails');

    Route::post('/meeting-join-pwd', function (Request $request) {

        $user = $request->user;
        $userType = $request->userType;
        $meetingID = $request->meetingID;

        return view('meeting.getPwd')->with('user', $user)->with('userType', $userType)->with('meetingID', $meetingID);
    });

    Route::post('/meeting-join', 'MeetingController@joinViaCalendar');

    //---------RECORDINGS--------------------------------------------------------------------------------------

    /// View recordings of meetings
    Route::get('/get-recordings', 'MeetingController@getRecordings');

    /// Delete recording
    Route::get('/delete-recording/{recording_id}', 'MeetingController@deleteRecording');

});
//TODO - if not action

Route::group(['middleware' => ['auth','isAdmin']], function () {
    /// View meetings pending for admin approval
    Route::get('/admin-approval', 'MeetingController@viewMeetingsPendingForAdminApproval');

    Route::get('/approve-meeting/{meeting_id}', 'MeetingController@approveMeeting');

    Route::get('/reject-meeting/{meeting_id}', 'MeetingController@rejectMeeting');

    /// View all meetings with edit/delete options
    Route::get('/view-meetings', function(){
        $meetings = Meeting::all();
        return view('meeting.viewMeetings')->with('meetings', $meetings);
    });

    Route::get('/edit-meeting/{meeting_id}', function($meeting_id){
        $meeting = Meeting::find($meeting_id);
        return view('meeting.editMeeting')->with('meeting', $meeting);
    });

    Route::post('/save-edited-meeting', 'MeetingController@editMeeting');

    Route::get('/delete-meeting/{meeting_id}', 'MeetingController@deleteMeeting');
});
//TODO - if not action


/// View upcoming meetings
Route::get('/upcoming-meetings', 'MeetingController@viewUpcomingMeetings');