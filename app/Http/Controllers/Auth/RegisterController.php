<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
//use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png' ,'max:5000'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(request()->has('avatar')){
            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            return User::create([
                'fname' => $data['fname'],
                'mname' => $data['mname'],
                'lname' => $data['lname'],
                'contact' => $data['contact'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'avatar' => '/images/'.  $avatarname,
            ]);
        }
        return User::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

   // public function register(Request $request){
        // if(request()->has('avatar')){
        //     $avataruploaded = request()->file('avatar');
        //     $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
        //     $avatarpath = public_path('/images/');
        //     $avataruploaded->move($avatarpath, $avatarname);
        //     $user = new User();
        //     $user->fname = $request->fname;
        //     $user->mname = $request->mname;
        //     $user->lname = $request->lname;
        //     $user->contact = $request->contact;
        //     $user->email = $request->email;
        //     $user->password = Hash::make($request->password);
        //     $user->avatar = '/images/'.  $avatarname;
        //     $user->verification_code = sha1(time());
        //     $user->save();
        // }
    //     $user = new User();
    //     $user->fname = $request->fname;
    //     $user->mname = $request->mname;
    //     $user->lname = $request->lname;
    //     $user->contact = $request->contact;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->verification_code = sha1(time());
    //     $user->save();

    // if($user != null){
    //     MailController::sendSignupEmail($user->fname, $user->email, $user->verification_code);
    //     return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
    // }

    // return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
    // }
}


