<?php

namespace App\Http\Controllers;

use App\Payments;
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
        return redirect()->back()->with('status','Your Membership Payment is Created.');
    }
}
