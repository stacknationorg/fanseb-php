<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\GlobalMail;
use App\Models\Notification;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(){
        return view("users.dashboard");
    }
    
    public function transactions(){
        $transactions = Transaction::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("users.transactions.index")->with([
            "transactions"=>$transactions
        ]);
    }
    public function orders(){
        $orders = Order::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("users.orders.index")->with([
            "orders"=>$orders
        ]);
    }
    public function rewards(){
        $rewards = Reward::where(["owner_id"=>Auth::user()->id])->latest()->paginate(15);
        return view("users.rewards.index")->with([
            "rewards"=>$rewards
        ]);
    }
}
