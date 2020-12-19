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
        // $data = Http::get('http://app.newsletters.lk/smsAPI?sendsms&apikey=Zq4IZo0KEsSfE3erNZRWp1til8TunPKp&apitoken=XlA21608312401&type=sms&from=Mora-FitB18&to=+94771466460,+94715591137,+94719274111&text=My+first+text&route=0')->json();

        dd ($data);

    }
}
