<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ForgotPasswordController extends Controller
{
    public function sendOTP(Request $request){

        //Add meetings to the table
        $user = User::all()->where('email', $request->email)->first();

        if($user == null){
            return redirect()->back()->with('alert', 'Email does not exist');
        }else{
            $otp = rand(100000, 999999);
            $text = "Your OTP for password reset at Urban CItizens Web Portal is : ".$otp." If you did not try to reset password, please contact the admin immedietly.";
            $response = app('App\Http\Controllers\SMSController')->send($user->contact, $text);

            return view('auth.otp')->with('userId', $user->id)->with('otp', $otp);

        }

    }

    public function verifyOTP(Request $request, $otpCorrect, $userId){

        //Add meetings to the table
        $user = User::find($userId);

        if($request->otp == $otpCorrect){
            return view('auth.reset')->with('userId', $user->id)->with('otpCorrect', $otpCorrect);
        }else{
            return redirect('/forgot-password')->with('userId', $user->id)->with('otp', $otpCorrect)->with('alert', "Wrong OTP!");
        }

    }

    public function resetPwd(Request $request){
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        
        if(strlen($password) >= 8){
            if($password == $password_confirmation){
                $user = User::find($request->userId);
    
                $user->password = Hash::make($password);
    
                $user->save();
    
                return redirect(route('login'));
            }else{
                //Error
                return redirect()->back()->with('alert', 'Passwords does not match');
            }
        }else{
            //Error
            return redirect()->back()->with('alert', 'Password must contain at least 8 characters');
        }
        
    }
}
