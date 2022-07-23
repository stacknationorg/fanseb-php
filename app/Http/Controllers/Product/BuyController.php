<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\GlobalMail;
use App\Models\Notification;

class BuyController extends Controller
{
    public function check($id){
        $product = Product::find($id);
        if($product===NULL){
            abort(404,"The content you are trying to access does not exist");
        }
        else{
            return view("products.check")->with([
                "product" => $product,
            ]);
        }
    }
    public function buy($id,Request $request){
        $this->validate($request,[
            "address"=>"required",
            "city"=>"required",
            "country"=>"required",
            "pincode"=>"required",
            "state"=>"required",
        ]);
        $product = Product::find($id);
        if($product===NULL){
            abort(404,"The content you are trying to access does not exist");
        }
        else{
             return redirect()->route('user.payment.choose', ["product",$id])->with(["address"=>$request->address,"city"=>$request->city,"state"=>$request->state,"country"=>$request->country,"pincode"=>$request->pincode]);
            
        }
    }
}
