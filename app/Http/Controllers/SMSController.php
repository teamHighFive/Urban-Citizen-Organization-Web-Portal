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

        $data = Http::get('http://app.newsletters.lk/smsAPI?sendsms&apikey='.getenv("NEWSLETTERS_API_KEY").'&apitoken='.getenv("NEWSLETTERS_API_TOKEN").'&type=sms&from=Mora-FitB18&to='.$to.'&text='.$text.'&route=0')->json();
        
        if ($data['status'] == "queued")
            return "SMS notifications sent successfully.";
        else if ($data['status'] == "error")
            return "An error occured while sending SMS notifications. ".$data['message'];

    }

    // --------------------------------------------------------------------------------------------------
    // Send SMS Manually
    // --------------------------------------------------------------------------------------------------
    public function manualSMS(Request $request){

        $response = $this->send($request->to, $request->text);
        return redirect()->back()->with('alert', $response);

    }
}
