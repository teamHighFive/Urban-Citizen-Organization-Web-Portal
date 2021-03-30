<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','verified']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('auth.useractivation');
        $users = DB::table('users')->get();
        return view('auth.useractivation', ['users' => $users]);
    }
    public function status(Request $request, $id){
        $data = User::find($id);

        if ($data->status == 0) {
            # code...
            $data->status=1;
        }else{
            $data->status=0;
        }
        $data->save();

        // return redirect()->back()->with('message', $data->fname.' Status has been changed sucessfully.');
        return Redirect::to('/user-active')->with('message', $data->fname.' Status has been changed sucessfully.');
    }

//     public function approval()
// {
//     return view('auth.approval');
// }


}
