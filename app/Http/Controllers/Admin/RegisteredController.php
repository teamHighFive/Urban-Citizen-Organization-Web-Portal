<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisteredController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function edit($id){
        $user_roles = User::find($id);
        return view('admin.users.edit')->with('user_roles', $user_roles);
    }
    public function updaterole(Request $request, $id){
        $user = User::find($id);
        $user->role_as = $request->input('roles');
        $user->isban = $request->input('isban');
        $user->update();

        return redirect()->back()->with('status','Role is Updated');
    }

    public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('status','Role is Deleted');
    }
}
