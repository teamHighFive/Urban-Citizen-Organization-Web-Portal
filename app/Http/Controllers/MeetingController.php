<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Kolkata");

use Illuminate\Http\Request;

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use BigBlueButton\Parameters\GetRecordingsParameters;

use App\Meeting;

class MeetingController extends Controller
{
    // --------------------------------------------------------------------------------------------------
    // Create and join a meeting
    // --------------------------------------------------------------------------------------------------
    public function createAndJoin(Request $request){

        $meeting = $this->create($request);

        $url = $this->join($meeting->meeting_id, 'moderator', $meeting->creator); //Send meeting ID and user type(attendee, moderator) as parameters
        return redirect($url);

    }

    // --------------------------------------------------------------------------------------------------
    // Schedule a meeting
    // --------------------------------------------------------------------------------------------------
    public function schedule(Request $request){

        $meeting = $this->create($request);

        return $meeting;

    }

    // --------------------------------------------------------------------------------------------------
    // Basic fuction for creating a meeting
    // --------------------------------------------------------------------------------------------------
    public function create(Request $request){

        //Add meetings to the table
        $meeting = new Meeting();

        $meeting->meeting_name = $request->meetingName;
        $meeting->meeting_description = $request->description;
        $meeting->creator = $request->user;
        $meeting->moderator_password = $request->moderatorPwd == null ? 'moderator_pwd' : $request->moderatorPwd;
        $meeting->attendee_password = $request->attendeePwd == null ? 'attendee_pwd' : $request->attendeePwd;
        $meeting->date = $request->date == null ? date("Y-m-d") : $request->date;
        $meeting->time = $request->time == null ? date('H:i:s') : $request->time;
        $meeting->recording = $request->recording != null ? true : false;
        $meeting->display_on_calendar = $request->calendar != null ? true : false;
        //If logged as an admin,
        $meeting->approval = true;
        //End If

        $meeting->save();

        return $meeting;

    }

    // --------------------------------------------------------------------------------------------------
    //Basic function for joining a meeting
    // --------------------------------------------------------------------------------------------------
    public function join($meetingID, $userType, $userName){ //Get meeting ID and user type(attendee, moderator) as parameters

        //When passing meeting ID get other details from database
        $meeting = Meeting::find($meetingID);

        $meetingName = $meeting->meeting_name;
        $moderatorPassword = $meeting->moderator_password;
        $attendeePassword = $meeting->attendee_password;
        //If a moderator, use moderator password, else use attendee password
        if ($userType == 'moderator'){
            $password = $moderatorPassword;
        }elseif($userType == 'attendee'){
            $password = $attendeePassword;
        }
        $recording = $meeting->recording;

        //TODO Check if the time is right

        $bbb = new BigBlueButton();

        $createParams = new CreateMeetingParameters($meetingID, $meetingName);
        $createParams = $createParams->setModeratorPassword($moderatorPassword)
                                     ->setAttendeePassword($attendeePassword)
                                     ->setRecord($recording)
                                     ->setAllowStartStopRecording($recording)
                                     ->setAutoStartRecording(false)
                                     ->setLogoutUrl('127.0.0.1:8000/');

        $response = $bbb->createMeeting($createParams);
        if ($response->getReturnCode() == 'FAILED') {
            return 'Can\'t create room! please contact our administrator.';
        } else {
            $joinParams = new JoinMeetingParameters($meetingID, $userName, $password);
            $joinParams->setRedirect(true);
            $url = $bbb->getJoinMeetingURL($joinParams);
            return $url;
        }

    }

    // --------------------------------------------------------------------------------------------------
    // View upcoming meetings and join. This should be used with the event calendar
    // --------------------------------------------------------------------------------------------------
    public function viewMeetings(){
        $meetings = Meeting::all()->where('approval', 1)->where('status',1);
        return view('meeting.viewMeetings')->with('meetings', $meetings);
    }

    public function joinDetails($meeting_id){
        return view('meeting.joinDetails')->with('meeting_id', $meeting_id);
    }

    public function joinViaCalendar(Request $request){
        $meetingID = $request->meetingID;
        $userType = $request->userType;
        $userName = $request->user;
        $password = $request->password;

        $meeting = Meeting::find($meetingID);

        if($userType == 'moderator'){
            if($password == $meeting->moderator_password){
                $url = $this->join($meetingID, $userType, $userName);
                return redirect($url);
            }
            else
                return 'Invalid Password';
        }elseif($userType == 'attendee'){
            if($password == $meeting->attendee_password){
                $url = $this->join($meetingID, $userType, $userName);
                return redirect($url);
            }
            else
                return 'Invalid Password';
        }

    }

    // --------------------------------------------------------------------------------------------------
    // View meetings pending for admin approval and accept or reject those requests
    // --------------------------------------------------------------------------------------------------
    public function viewMeetingsPendingForAdminApproval(){
        $meetings = Meeting::all()->where('approval', 0)->where('status',1);
        return view('meeting.adminApproval')->with('meetings', $meetings);
    }

    public function approveMeeting($meeting_id){
        $meeting = Meeting::find($meeting_id);
        $meeting->approval = 1;
        $meeting->save();
        return redirect('/admin-approval');

    }

    public function rejectMeeting($meeting_id){
        $meeting = Meeting::find($meeting_id);
        $meeting->approval = 1;
        $meeting->status = 0;
        $meeting->save();
        return redirect('/admin-approval');
    }

    // --------------------------------------------------------------------------------------------------
    //  Get meeting recordings
    // --------------------------------------------------------------------------------------------------
    public function getRecordings(){
        $bbb = new BigBlueButton();
        $recordingParams = new GetRecordingsParameters();
        $response = $bbb->getRecordings($recordingParams);
        
        if ($response->getReturnCode() == 'SUCCESS') {
            if (empty($response->getRawXml()->recordings->recording)){
                return view('meeting.getRecordings')->with('message', "NODATA");
            }else {
                $recordings=array();
                foreach ($response->getRawXml()->recordings->recording as $recording) {
                    array_push($recordings,$recording);
                }
                return view('meeting.getRecordings')->with('recordings', $recordings)->with('message', "SUCCESS");
            }
        }else {
            return view('meeting.getRecordings')->with('message', "UNSUCCESS");
        }
    }
}
