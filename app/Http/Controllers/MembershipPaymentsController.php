<?php

namespace App\Http\Controllers;

use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipPaymentsController extends Controller
{
    public function mpayments()
    {
        $payments = Payments::all()->where('user_id', Auth::user()->id)->sortby('year');
        return view('auth.payments')->with('payments', $payments);
    }

    public function membersPayments($id){
        $payments = Payments::all()->where('user_id', $id)->sortby('year');
        return view('auth.members_payments')->with('payments', $payments);
    }

    public function createPayments(Request $request)
    {
        $payment = new Payments();
        $payment->year = $request->input('year');
        $payment->user_id = Auth::user()->id;
        $payment->save();

        $text = 'Your mambership payment of LKR 750.00, for the year '.$payment->year.' has been made successfully.';

        $response = app('App\Http\Controllers\SMSController')->send(Auth::user()->contact, $text);

        if($response == 'SMS notifications sent successfully.'){
            return redirect()->back()->with('status','Your Membership Payment has been made successfully. You will recieve a confirmation SMS soon.');
        }else{
            return redirect()->back()->with('status','Your Membership Payment has been made successfully. '.$response);
        }
        
        
    }
}
