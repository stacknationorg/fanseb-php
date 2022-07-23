<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Models\Api;
use Auth;

class WalletController extends Controller
{
    public function index(){
        $transactions = Transaction::where("user_id",Auth::user()->id)->latest()->paginate(15);
        $withdrawals = Withdraw::where("user_id",Auth::user()->id)->latest()->paginate(15);
        $user = Auth::user();
        return view("instructor.wallet.index")->with([
            "transactions"=>$transactions,
            "withdrawals"=>$withdrawals,
            "user"=>$user
        ]);
    }
    public function accounts(){
        $user = Auth::user();
        $user->bank_acc_id = \json_decode($user->bank_acc_id);
        $user->upi_acc_id = \json_decode($user->upi_acc_id);
        return view("instructor.wallet.accounts")->with([
            "user"=>$user
        ]);
    }
    public function addBank(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "ifsc"=>"required",
            "acc_no"=>"required",
        ]);
        $api = Api::first();
        $api_key=$api->razorpay_key_id;
        $api_secret=$api->razorpay_key_secret;
        $user = Auth::user();
        
        if($user->razor_contact_id===NULL){
            // Adding a contact
            $c = curl_init();
            \curl_setopt($c,CURLOPT_USERPWD,$api_key.":".$api_secret);
            \curl_setopt($c,CURLOPT_URL,"https://api.razorpay.com/v1/contacts");
            \curl_setopt($c,CURLOPT_POST,1);
            \curl_setopt($c,CURLOPT_RETURNTRANSFER,TRUE);
            \curl_setopt($c,CURLOPT_POSTFIELDS,array(
                "name"=> Auth::user()->name,
                "email"=> Auth::user()->email,
            ));
            $res = curl_exec($c);
            \curl_close($c);
            $contact = json_decode($res);
            $user->razor_contact_id = $contact->id;
            $user->save();
        }
        $contact_id=$user->razor_contact_id;

        // Adding a fund account
        $bank_account = array(
            "name"=>$request->name,
            "ifsc"=>$request->ifsc,
            "account_number"=>$request->acc_no,
        );
        $fdata = array(
            "contact_id"=>$contact_id,
            "account_type"=>"bank_account",
            "bank_account"=>$bank_account
        );
        $c = curl_init();
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        \curl_setopt($c,CURLOPT_USERPWD,$api_key.":".$api_secret);
        \curl_setopt($c,CURLOPT_URL,"https://api.razorpay.com/v1/fund_accounts");
        \curl_setopt($c,CURLOPT_POST,1);
        \curl_setopt($c,CURLOPT_RETURNTRANSFER,TRUE);
        \curl_setopt($c,CURLOPT_POSTFIELDS,\json_encode($fdata));
        $res = curl_exec($c);
        \curl_close($c);
        $fund = json_decode($res);

        $bank_acc = [
            "fund_id" => $fund->id,
            "account_no" => $request->acc_no,
            "ifsc" => $request->ifsc,
            "name" => $request->name,
        ];
        $user->bank_acc_id = json_encode($bank_acc);
        $user->save();
        $request->session()->flash('success', "Bank Account Added");
        return redirect()->back();
    }
    public function addUpi(Request $request){
        $this->validate($request,[
            "upi"=>"required",
        ]);
        $api = Api::first();
        $api_key=$api->razorpay_key_id;
        $api_secret=$api->razorpay_key_secret;
        $user = Auth::user();
        
        if($user->razor_contact_id===NULL){
            // Adding a contact
            $c = curl_init();
            \curl_setopt($c,CURLOPT_USERPWD,$api_key.":".$api_secret);
            \curl_setopt($c,CURLOPT_URL,"https://api.razorpay.com/v1/contacts");
            \curl_setopt($c,CURLOPT_POST,1);
            \curl_setopt($c,CURLOPT_RETURNTRANSFER,TRUE);
            \curl_setopt($c,CURLOPT_POSTFIELDS,array(
                "name"=> Auth::user()->name,
                "email"=> Auth::user()->email,
            ));
            $res = curl_exec($c);
            \curl_close($c);
            $contact = json_decode($res);
            $user->razor_contact_id = $contact->id;
            $user->save();
        }
        $contact_id=$user->razor_contact_id;

        // Adding a fund account
        $upi_acc = array(
            "address"=>$request->upi,
        );
        $udata = array(
            "contact_id"=>$contact_id,
            "account_type"=>"vpa",
            "vpa"=>$upi_acc
        );
        $c = curl_init();
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        \curl_setopt($c,CURLOPT_USERPWD,$api_key.":".$api_secret);
        \curl_setopt($c,CURLOPT_URL,"https://api.razorpay.com/v1/fund_accounts");
        \curl_setopt($c,CURLOPT_POST,1);
        \curl_setopt($c,CURLOPT_RETURNTRANSFER,TRUE);
        \curl_setopt($c,CURLOPT_POSTFIELDS,\json_encode($udata));
        $res = curl_exec($c);
        \curl_close($c);
        $fund = json_decode($res);

        $bank_acc = [
            "fund_id" => $fund->id,
            "upi" => $request->upi,
        ];
        $user->upi_acc_id = json_encode($bank_acc);
        $user->save();
        $request->session()->flash('success', "UPI Account Added");
        return redirect()->back();
    }
    public function withdraw(Request $request){
        $this->validate($request,[
            "amount"=>"required",
            "mode"=>"required",
        ]);
        $user = Auth::user();
        if($request->mode==="IMPS" and $user->bank_acc_id===NULL){
            $request->session()->flash('error', "You haven't added any bank account yet.");
            return redirect()->back();
        }
        if($request->mode==="UPI" and $user->upi_acc_id===NULL){
            $request->session()->flash('error', "You haven't added any upi account yet.");
            return redirect()->back();
        }
        if($request->amount>$user->balance){
            $request->session()->flash('error', "You do not have sufficient balance to withdraw.");
            return redirect()->back();
        }
        $withdraw = new Withdraw;
        $withdraw->user_id = $user->id;
        $withdraw->amount = $request->amount;
        $withdraw->mode = $request->mode;
        if($request->mode==="IMPS"){
            $withdraw->details = $user->bank_acc_id;
        }
        else{
            $withdraw->details = $user->upi_acc_id;
        }
        $withdraw->save();
    
        $utransaction = new Transaction;
        $utransaction->transaction_id = rand(0,99999).rand(0,99999).rand(0,99999).rand(0,99999).rand(0,99999);
        $utransaction->user_id = $user->id;
        $utransaction->amount = $request->amount;
        $utransaction->status = "Applied for withdrawal";
        $utransaction->item_type = "Withdrawal";
        $utransaction->item_id = -1;
        $utransaction->payment_gateway = "RazorPay";
        $utransaction->save();
        $user->wallet = $user->wallet - $request->amount;
        $user->save();
        $request->session()->flash('success', "Withdrawal request sent");
        return redirect()->back();
    }
}
