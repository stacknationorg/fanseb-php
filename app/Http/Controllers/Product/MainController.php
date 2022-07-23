<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(16);
        return view("products.view")->with([
            "products" => $products
        ]);
    }
    public function view($id,$title){
        $product = Product::find($id);
        if($product===NULL){
            abort(404,"The content you are trying to access does not exist");
        }
        if($title == md5($product->title)){
            $product->images = json_decode($product->images);
            return view("products.index")->with([
                "product"=>$product,
            ]);
        }
        else{
            abort(404);
        }
    }
}
