<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function myprofile()
    {
        return view('auth.profile');
    }

    public function profileupdate(Request $request)
    {
        $this->validate($request,[
            'fname'=>'sometimes|string|max:255',
            'mname'=>'sometimes|string|max:255',
            'lname'=>'sometimes|string|max:255',
            'contact'=>'sometimes|numeric|digits:10',
            'city'=>'sometimes|string|max:20',
            'avatar' => 'image|sometimes|max:5000|mimes:jpg,jpeg,bmp,svg,png'
        ]);

        $str1 = substr($request->input('contact'), 1);

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->fname = $request->input('fname');
        $user->mname = $request->input('mname');
        $user->lname = $request->input('lname');
        $user->contact = "+94".$str1;
        $user->city = $request->input('city');

        if($request->has('avatar'))
        {
            //get file
            $avataruploaded = $request->file('avatar');
            //set file name with extension
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            //set path for image file
            $avatarpath = public_path('/images/');
            //move image file perticular location
            $avataruploaded->move($avatarpath, $avatarname);
            $user->avatar ='/images/'. $avatarname;
        }


        $user->update();
        return redirect()->back()->with('status','Your Profile is Updated');
    }

}
