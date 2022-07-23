<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Product;
use App\Models\Order;

use App\Models\Transaction;
use App\Models\Api as APIs;
use Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\GlobalMail;
use App\Models\Notification;


class PaymentController extends Controller
{
    public function choose($id,Request $request){
            $item = Product::find($id);
            $address= $request->session()->get("address");
            $city = $request->session()->get("city");
            $state= $request->session()->get("state");
            $country= $request->session()->get("country");
            $pincode= $request->session()->get("pincode");
        
        return view("users.payments.choose")->with([
            "id"=>$id,
            "item"=>$item,
            "address"=>$address,
            "city"=>$city,
            "state"=>$state,
            "country"=>$country,
            "pincode"=>$pincode,
           
        ]);
    }
    public function razorpay($id){
        
            $item = Product::find($id);
        
        
        if($item===NULL){
            Session()->flash("error","The item does not exist");
            return redirect()->back();
        }
        return view("users.payments.razorpay")->with([
            
            "item"=>$item,
           
        ]);
    }
    public function razorpayPay($id,Request $request){
        
        
            $item = Product::find($id);
            $owner = $item->owner;
        
       
        if($item===NULL){
            Session()->flash("error","The item does not exist");
            return redirect()->back();
        }
        $input = $request->all();
        //get API Configuration 
        $apis = APIs::first();
        $api = new Api($apis->razorpay_key_id, $apis->razorpay_key_secret);
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }

            $transaction = new Transaction;
            $transaction->transaction_id = $input['razorpay_payment_id'];
            $transaction->user_id = Auth::user()->id;
            $transaction->item_id = $item->id;
            $transaction->amount = $payment['amount']/100;
            $transaction->status = "Paid";
            $transaction->payment_gateway = "Razorpay";
            $transaction->save();

            $transaction = new Transaction;
            $transaction->transaction_id = $input['razorpay_payment_id'];
            $transaction->user_id = $owner->id;
            $transaction->item_id = $item->id;
            $transaction->amount = $payment['amount']/100;
            $transaction->status = "Received";
            $transaction->payment_gateway = "Razorpay";
            $transaction->save();
            $owner->wallet = $owner->wallet + $payment['amount']/100;
            $owner->save();
            
                $item = Product::find($id);
                $buy = new Order;
                $buy->user_id = Auth::user()->id;
                $buy->product_id = $item->id;
                $buy->save();
    
               

                // Mail
                $user = Auth::user();
                $sub = "Welcome to ".$item->title;
                $message="<p>Dear ".$user->name.",</p><p>You have successfully purchased ".$item->title.".</p>";
                $data = array('sub'=>$sub,'message'=>$message);
                Mail::to($user->email)->send(new GlobalMail($data));
        
                $notification = new Notification;
                $notification->user_id = $user->id;
                $notification->message = "You have successfully purchased ".$item->title;
                $notification->save();
        
                $notification = new Notification;
                $notification->user_id = $item->instructor->id;
                $notification->message = $user->name." have purchased ".$item->title;
                $notification->save();
                $request->session()->flash('success', "You have successfully purchased");
                return redirect()->route('products.view', [$item->id,md5($item->title)]);
            
            
            
        }
    }

}
