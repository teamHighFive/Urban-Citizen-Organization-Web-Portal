<?php

namespace App\Http\Controllers;

use App\Payments;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipPaymentsController extends Controller
{
    public function mpayments()
    {
        $payments = Payments::all()->where('user_id', Auth::user()->id);
        return view('auth.payments')->with('payments', $payments);
    }

    public function membersPayments($id){
        $payments = Payments::all()->where('user_id', $id);
        return view('auth.members_payments')->with('payments', $payments);
    }

    public function createPayments(Request $request)
    {
        $payment = new Payments();
        $payment->year = $request->input('year');
        $payment->user_id = Auth::user()->id;
        $payment->save();

        $user = User::find($payment->user_id);
        // dd ($user->contact);
        $response = app('App\Http\Controllers\SMSController')->send($user->contact, "Your membership payment of LKR 750.00 for the year ".$payment->year." has been made successfully. Thank you");
        return redirect()->back()->with('status',$response);
    }
}
