<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index($type="User"){
        if($type==="User"){
            $users = User::latest()->paginate(10);
        }
        else{
            $users = User::where("role",$type)->latest()->paginate(10);
        }
        return view("admin.users")->with([
            "users" => $users,
            "type" => $type
        ]);
    }
    public function approve(Request $request){
        $this->validate($request,[
            "id"=>"required",
        ]);
        $user = User::findOrFail($request->id);
        $user->approved = 1;
        $user->save();
        $request->session()->flash('success', "User approved");
        return redirect()->back();
    }
    public function reject(Request $request){
        $this->validate($request,[
            "id"=>"required",
        ]);
        $user = User::findOrFail($request->id);
        $user->delete();
        $request->session()->flash('success', "User deleted");
        return redirect()->back();
    }
    public function login(Request $request){
        $this->validate($request,[
            "id"=>"required",
        ]);
        $user = User::findOrFail($request->id);
        Auth::logout();
        Auth::login($user);
        return redirect()->route('home');
    }
}
