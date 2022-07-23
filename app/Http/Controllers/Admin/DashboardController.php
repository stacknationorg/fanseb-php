<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Pebble;
use App\Models\Collection;


class DashboardController extends Controller
{
    public function index(){
        return view("admin.dashboard");
    }
    public function transactions(){
        $transactions = Transaction::latest()->paginate(15);
        return view("admin.transactions.index")->with([
            "transactions" => $transactions
        ]);
    }
    public function orders(){
        $orders = Order::latest()->paginate(15);
        return view("admin.orders.index")->with([
            "orders"=>$orders
        ]);
    }
    public function pebbles(){
        $pebbles = Pebble::latest()->paginate(15);
        return view("admin.pebbles.index")->with([
            "pebbles"=>$pebbles
        ]);
    }
    public function collections(){
        $collections = Collection::latest()->paginate(15);
        return view("creator.collections.index")->with([
            "collections"=>$collections
        ]);
    }
    public function products(){
        $products = Product::latest()->paginate(15);
        return view("creator.products.index")->with([
            "products"=>$products
        ]);
    }
    public function setting(){
        return view("admin.settings")->with([
          
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "rewardrate"=>"required",
            "commission"=>"required",
            
        ]);
        $setting = new Setting;
        $setting->rewardrate = $request->rewardrate;
        $setting->commission = $request->commission;
        $setting->owner_id = Auth::user()->id;
        $setting->save();

        // Mail
        $user = Auth::user();
        $sub = "Your settings are successfully updated.";
        $message="<p>Dear ".$user->name.",</p><p>Your settings are successfully updated.</p>";
        $data = array('sub'=>$sub,'message'=>$message);
        Mail::to($user->email)->send(new GlobalMail($data));

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->message = "Your settings are successfully updated";
        $notification->save();
        $request->session()->flash('success', "Settings updated.");
        return redirect()->route('admin.settings');
    }
}
