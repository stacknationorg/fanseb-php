<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
 
class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view("users.profile")->with([
            "user"=>$user,
        ]);
    }
    public function update(Request $request){
        $this->validate($request,[
            "name" => "required|string",
            "email" => "required|email",
            "mobile" => "required",
            "username" => "nullable",
            "description" => "required",
            "country" => "nullable",
            "state" => "nullable",
            "city" => "nullable",
            "address" => "nullable",
            "pin_code" => "nullable",
            "photo" => "nullable",
            "facebook" => "nullable",
            "twitter" => "nullable",
            "instagram" => "nullable",
            "linkedin" => "nullable",
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
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;
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

    public function settings(){
        return view("users.settings");
    }

    public function edit(Request $request){
        $this->validate($request,[
            "current_password"=>"required|string|min:8",
            "password"=>"required|string|confirmed|min:8",
        ]);
        $user = Auth::user();
        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $request->session()->flash('success', "Password changed successfully");
            Auth::logout();
            return redirect()->back();
        }
        else{
            $request->session()->flash('error', "The current password is incorrect");
            return redirect()->back();
        }
    }
    
}
