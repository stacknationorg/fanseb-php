<?php

namespace App\Http\Controllers\Accountant;

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
        return view("user.dashboard");
    }
    
    public function orders(){
        $orders = Order::latest()->paginate(15);
        return view("accounts.orders")->with([
            "orders"=>$orders
        ]);
    }
    public function transactions(){
        $transactions = Transaction::latest()->paginate(15);
        return view("accounts.transactions")->with([
            "transactions"=>$transactions
        ]);
    }
}