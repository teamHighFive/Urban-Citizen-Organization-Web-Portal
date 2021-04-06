<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserApprovelController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('auth.useractivation', ['users' => $users]);
    }
    public function status($id){
        $data = User::find($id);

        if ($data->status == 0) {
            $data->status=1;
        }else{
            $data->status=0;
        }
        $data->save();

        return Redirect::to('/user-active')->with('message', $data->fname.' '.$data->mname.' Approvel has been changed sucessfully.');
    }
}
