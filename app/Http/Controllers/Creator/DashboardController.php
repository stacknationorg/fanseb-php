<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Mail\GlobalMail;
use App\Models\Notification;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Pebble;
use App\Models\Collection;


class DashboardController extends Controller
{
    public function index(){
        return view("creator.dashboard");
    }
    public function create(){
        $pros = Product::latest()->get();
        return view("creator.products.create")->with([
            
            "pros"=>$pros,
        ]);
    }
    public function update(Request $request){
        $this->validate($request,[
            "product"=>"required",
            
        ]);
        $product = new Product;
        $product->product_id = $request->product;
        $product->owner_id = Auth::user()->id;
        $product->save();

        // Mail
        $user = Auth::user();
        

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->message = "Product ".$product->title." is successfully selected";
        $notification->save();
        $request->session()->flash('success', "product selected.");
        return redirect()->route('creator.products');
    }
    public function delete(Request $request){
        $this->validate($request,[
            "id"=>"required"
        ]);
        $cproduct = Product::find($request->id);
        Order::where("product_id",$cproduct->id)->delete();
        $cproduct->delete();
        $request->session()->flash('success', "Product successfully deleted");
        return redirect()->back();
    }
    public function products(){
        $products = Product::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("creator.products.index")->with([
            "products"=>$products
        ]);
    }
    public function orders(){
        $orders = Order::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("creator.orders.index")->with([
            "orders"=>$orders
        ]);
    }
    public function transactions(){
        $transactions = Transaction::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("creator.transactions.index")->with([
            "transactions"=>$transactions
        ]);
    }
    public function pebbles(){
        $pebbles = Pebble::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("creator.pebbles.index")->with([
            "pebbles"=>$pebbles
        ]);
    }
    public function collections(){
        $collections = Collection::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("creator.collections.index")->with([
            "collections"=>$collections
        ]);
    }
    public function pcreate(){
        
        $products = Product::latest()->get();
        return view("creator.pebbles.create")->with([
       
            "products"=>$products,
        ]);
    }
    public function pupdate(Request $request){
        $this->validate($request,[
            "title"=>"required",
            "products"=>"required",
            "video"=>"required",
            "description"=>"required",
            "thumbnail"=>"required",
            
        ]);
        $pebble = new Pebble;
        
        $pebble->title = $request->title;
        $pebble->description = $request->description;
        $pebble->owner_id = Auth::user()->id;
        $pebble->products = json_encode($request->products);
        $pebble->save();

        if($request->hasFile("thumbnail")){
            $tpath = "assets/pebbles/thumbnail/";
            $name = $_FILES["thumbnail"]["name"];
            $tmp = $_FILES["thumbnail"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $pebble->thumbnail = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading thumbnail");
                return redirect()->back();
            }
        }
        if($request->hasFile("video")){
            $tpath = "assets/pebbles/video/";
            $name = $_FILES["video"]["name"];
            $tmp = $_FILES["video"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $pebble->video = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading video");
                return redirect()->back();
            }
        }
        // Mail
        $user = Auth::user();
        $sub = "pebble has been selected successfully.";
        $message="<p>Dear ".$user->name.",</p><p> pebble ".$pebble->title." is successfully selected.</p>";
        $data = array('sub'=>$sub,'message'=>$message);
        Mail::to($user->email)->send(new GlobalMail($data));

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->message = "Product ".$pebble->title." is successfully selected";
        $notification->save();
        $request->session()->flash('success', "pebble selected.");
        return redirect()->route('creator.pebbles');
    }
    public function ccreate(){
       
        $products = Product::latest()->get();
        return view("creator.collections.create")->with([
         
            "products"=>$products,
        ]);
    }
    public function cupdate(Request $request){
        $this->validate($request,[
            "products"=>"required",
            "title"=>"required",
            "thumbnail"=>"required",
            
        ]);
        $collection = new Pebble;
        $collection->title = $request->video;
        
        $collection->owner_id = Auth::user()->id;
        $collection->products = json_encode($request->products);
        
        if($request->hasFile("thumbnail")){
            $tpath = "assets/collections/thumbnail/";
            $name = $_FILES["thumbnail"]["name"];
            $tmp = $_FILES["thumbnail"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $collection->thumbnail = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading thumbnail");
                return redirect()->back();
            }
        }
        $collection->save();

        // Mail
        $user = Auth::user();
        $sub = "Collection has been selected successfully.";
        $message="<p>Dear ".$user->name.",</p><p> Collection ".$collection->title." is successfully selected.</p>";
        $data = array('sub'=>$sub,'message'=>$message);
        Mail::to($user->email)->send(new GlobalMail($data));

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->message = "Collection ".$collection->title." is successfully selected";
        $notification->save();
        $request->session()->flash('success', "Collection selected.");
        return redirect()->route('creator.collections');
    }

}
