<?php

namespace App\Http\Controllers;

use App\Mail\EmailWithdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class robotPayment extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
    $datarobots = DB::table('robots')
    ->orderByDesc('id')->paginate(10);
    

    if(isset($request->confirmid)){
                $datarobot = DB::table('robots')
            ->where('robotID', $request->confirmid)
            ->first();
            
            $datawithuser = DB::table('users')
            ->where('userID', $datarobot->user_id)
            ->first();
        DB::table('robots')
        ->where('robotID', $request->confirmid)
        ->update(['status' => 'CONFIRM']);
        //email.....

        // $details = [
        //     'name' => $datawithuser->firstname. ' ' .$datawithuser->lastname,
        //     'amount' => $datarobot->amount,
        //     'wallet' => $datarobot->wallet_address,
        //     'id' => $datarobot->robotID,
        // ]; 

        // Mail::to($datawithuser->email)->send(new EmailWithdraw($details));
        return back();
    
    }elseif(isset($request->unconfirmid)){
            DB::table('robots')
                ->where('robotID', $request->unconfirmid)
                ->update(['status' => 'PENDING']);
                return back();

        }elseif(isset($request->deleteid)){
            DB::table('robots')
            ->where('robotID', $request->deleteid)
            ->delete();
            return back();

        }else{
        return view('admin.robotpayment')->with('datarobots', $datarobots);  

       }
    }
}
