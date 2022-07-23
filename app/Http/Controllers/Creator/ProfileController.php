<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view("creator.profile")->with([
            "user"=>$user,
        ]);
    }
    public function update(Request $request){
        $this->validate($request,[
            "name" => "required|string",
            "email" => "required|email",
            "mobile" => "required",
            "description" => "required",
            "country" => "nullable",
            "state" => "nullable",
            "city" => "nullable",
            "address" => "nullable",
            "pin_code" => "nullable",
            "photo" => "nullable",
            "facebook" => "nullable",
            "fb_count" => "nullable",
            "ig_count" => "nullable",
            "yt_count" => "nullable",
            "t_count" => "nullable",
            "twitter" => "nullable",
            "instagram" => "nullable",
            "Youtube" => "nullable",
            "username" => "nullable",
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->description = $request->description;
        if($user->email !== $request->email){
            if(User::where("email",$request->email)->exists()){
                $request->session()->flash('error', "The email already exists");
                return redirect()->back();
            }
        }
        $user->email = $request->email;
        if($user->mobile !== $request->mobile){
            if(User::where("mobile",$request->mobile)->exists()){
                $request->session()->flash('error', "The mobile number already exists");
                return redirect()->back();
            }
        }
        $user->mobile = $request->mobile;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->pin_code = $request->pin_code;
        $user->facebook = $request->facebook;
        $user->fb_count = $request->fb_count;
        $user->ig_count = $request->ig_count;
        $user->t_count = $request->t_count;
        $user->yt_count = $request->yt_count;
        $user->instagram = $request->instagram;
        $user->youtube = $request->youtube;
        $user->twitter = $request->twitter;
        $user->username = $request->username;
        if($request->hasFile("photo")){
            $path = "assets/users/photo/";
            $name = $_FILES["photo"]["name"];
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp_name,$path.$name)){
                if($user->photo!==NULL){
                    unlink($path.$user->photo);
                }
                $user->photo = $name;
            }
            else{
                $request->session()->flash('error', "There is some error in uploading photo");
                return redirect()->back();
            }
        }
        $user->save();
        $request->session()->flash('success', "Profile Successfully Updated");
        return redirect()->back();
    }
    public function view($id,$name){
        $user = User::find($id);
        if($user===NULL){
            abort(404);
        }
        else{
            if($name == md5($user->name)){
                return view("creator.view")->with([
                    "user" => $user
                ]);
            }
            else{
                abort(404);
            }
        }
    }
}
