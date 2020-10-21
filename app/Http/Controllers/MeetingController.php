<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Kolkata");

use Illuminate\Http\Request;

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;

use App\Meeting;

class MeetingController extends Controller
{
    public function createAndJoin(Request $request){

        $meeting = $this->create($request);

        $url = $this->join($meeting->meeting_id, 'moderator', $meeting->creator); //Send meeting ID and user type(attendee, moderator) as parameters
        return redirect($url);

    }

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

        //Check if the time is right


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
}
