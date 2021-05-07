<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Kolkata");

use Illuminate\Http\Request;
use Illuminate\support\Facades\Http;

class SMSController extends Controller
{
    // --------------------------------------------------------------------------------------------------
    // Send SMS
    // --------------------------------------------------------------------------------------------------
    public function send($to, $text){

        $data = Http::get('http://app.newsletters.lk/smsAPI?sendsms&apikey='.getenv("NEWSLETTERS_API_KEY").'&apitoken='.getenv("NEWSLETTERS_API_TOKEN").'&type=sms&from='.getenv("NEWSLETTERS_SENDER_ID").'&to='.$to.'&text='.$text.'&route=0')->json();
        
        if ($data['status'] == "queued")
            return "SMS notifications sent successfully.";
        else if ($data['status'] == "error")
            return "An error occured while sending SMS notifications. ".$data['message'];
    }

    // --------------------------------------------------------------------------------------------------
    // Send SMS Manually
    // --------------------------------------------------------------------------------------------------
    public function manualSMS(Request $request){

        $recipientsArr = $request->recipients;
        if($recipientsArr == null){
            return redirect()->back()->with('error', "No cantact was selected.");
        }
        $recipients = implode(",", $recipientsArr);

        $attendeePwd = $request->attendee != null ? $request->attendeePwd : '';
        $moderatorPwd = $request->moderator != null ? $request->moderatorPwd : '';

        $text = $request->text;

        if($attendeePwd != ""){
            $text = $text."  "."Attendee Password : ".$attendeePwd;
        }
        if($moderatorPwd != ""){
            $text = $text."  "."Moderator Password : ".$moderatorPwd;
        }

        $response = $this->send($recipients, $text);
        return redirect()->back()->with('status', $response);

    }

}
