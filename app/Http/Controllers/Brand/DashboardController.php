<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Mail\GlobalMail;
use App\Models\Notification;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
class DashboardController extends Controller
{
    public function index(){
        return view("brand.dashboard");
    }
    
    public function create(){
        $categories = Category::latest()->get();
        return view("brand.products.create")->with([
            "categories"=>$categories,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "title"=>"required",
            "description"=>"required",
            "specifications"=>"required",
            "availability"=>"nullable",
            "thumbnail"=>"required|image",
            "discountprice"=>"nullable",
            "video"=>"nullable",
            "images"=>"nullable",
            "price"=>"required",
            
        ]);
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->owner_id = Auth::user()->id;
        $product->availability = $request->availability;
        $product->specifications = $request->specifications;
        $product->discountprice = $request->discountprice;
        $product->price = $request->price;
       
        if($request->hasFile("thumbnail")){
            $tpath = "assets/products/thumbnail/";
            $name = $_FILES["thumbnail"]["name"];
            $tmp = $_FILES["thumbnail"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $product->thumbnail = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading thumbnail");
                return redirect()->back();
            }
        }
        if($request->hasFile("video")){
            $tpath = "assets/products/video/";
            $name = $_FILES["video"]["name"];
            $tmp = $_FILES["video"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $product->video = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading video");
                return redirect()->back();
            }
        }
        
        $images = [];
        foreach($_FILES["images"]["tmp_name"] as $key => $img){
            $ext = explode(".",$_FILES["images"]["name"][$key])[1];
            $name = \chunk_split(\base64_encode(\file_get_contents($img)));
            $name = "data:image/".$ext.";base64,".$name;
            $images[] = $name;
        }
        $product->images = \json_encode($images); 

        $product->save();

        // Mail
        $user = Auth::user();
        $sub = "Your product has been created successfully.";
        $message="<p>Dear ".$user->name.",</p><p>Your product ".$product->title." is successfully created.</p>";
        $data = array('sub'=>$sub,'message'=>$message);
        Mail::to($user->email)->send(new GlobalMail($data));

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->message = "Your product ".$product->title." is successfully created";
        $notification->save();
        $request->session()->flash('success', "product created.");
        return redirect()->route('brand.products');
    }
    public function update(Request $request){
        $this->validate($request,[
            "title"=>"required",
            "description"=>"required",
            "specifications"=>"required",
            "availability"=>"nullable",
            "thumbnail"=>"required|image",
            "discountprice"=>"nullable",
            "video"=>"nullable",
            "images"=>"nullable",
            "price"=>"required",
           
        ]);
        $product = Product::find($id);
        if($product===NULL){
            abort(404);
        }
        else{
            if($product->owner_id!==Auth::user()->id){
                abort(404);
            }
            else{
        $product->title = $request->title;
        $product->description = $request->description;
        $product->owner_id = Auth::user()->id;
        $product->availability = $request->availability;
        $product->specifications = $request->specifications;
        $product->discountprice = $request->discountprice;
       
       
        $product->price = $request->price;
       
        if($request->hasFile("thumbnail")){
            $tpath = "assets/products/thumbnail/";
            $name = $_FILES["thumbnail"]["name"];
            $tmp = $_FILES["thumbnail"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $product->thumbnail = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading thumbnail");
                return redirect()->back();
            }
        }
        if($request->hasFile("video")){
            $tpath = "assets/products/video/";
            $name = $_FILES["video"]["name"];
            $tmp = $_FILES["video"]["tmp_name"];
            $name = idate("U").$name;
            if(\move_uploaded_file($tmp,$tpath.$name)){
                $product->video = $name;
            }
            else{
                $request->session()->flash('error', "There is some problem in uploading video");
                return redirect()->back();
            }
        }
        }
        
        $images = [];
        foreach($_FILES["images"]["tmp_name"] as $key => $img){
            $ext = explode(".",$_FILES["images"]["name"][$key])[1];
            $name = \chunk_split(\base64_encode(\file_get_contents($img)));
            $name = "data:image/".$ext.";base64,".$name;
            $images[] = $name;
        }
        $product->images = \json_encode($images); 

        $product->save();

        // Mail
        $user = Auth::user();
        $sub = "Your product has been created successfully.";
        $message="<p>Dear ".$user->name.",</p><p>Your product ".$product->title." is successfully created.</p>";
        $data = array('sub'=>$sub,'message'=>$message);
        Mail::to($user->email)->send(new GlobalMail($data));

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->message = "Your product ".$product->title." is successfully created";
        $notification->save();
        $request->session()->flash('success', "product created.");
        return redirect()->route('brand.products');
    }
    }

    public function delete(Request $request){
        $this->validate($request,[
            "id"=>"required"
        ]);
        $product = Product::find($request->id);
        unlink("assets/products/thumbnail/".$product->thumbnail);
        Order::where("product_id",$product->id)->delete();
        $product->delete();
        $request->session()->flash('success', "Product successfully deleted");
        return redirect()->back();
    }


    public function products(){
        $products = Product::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("brand.products.index")->with([
            "products"=>$products
        ]);
    }
    public function orders(){
        $orders = Order::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("brand.orders.index")->with([
            "orders"=>$orders
        ]);
    }
    public function transactions(){
        $transactions = Transaction::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("brand.transactions.index")->with([
            "transactions"=>$transactions
        ]);
    }
}
