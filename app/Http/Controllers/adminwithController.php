<?php

namespace App\Http\Controllers;

use App\Mail\EmailWithdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class adminwithController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
                $datawithdraws = DB::table('withdraws')
                ->get();
                

                if(isset($request->confirmid)){
                            $datawithdraw = DB::table('withdraws')
                        ->where('withdraw_id', $request->confirmid)
                        ->first();
                        
                        $datawithuser = DB::table('users')
                        ->where('userID', $datawithdraw->user_id)
                        ->first();
                    DB::table('withdraws')
                    ->where('withdraw_id', $request->confirmid)
                    ->update(['status' => 'CONFIRM']);
                    //email.....

                    $details = [
                        'name' => $datawithuser->firstname. ' ' .$datawithuser->lastname,
                        'amount' => $datawithdraw->amount,
                        'wallet' => $datawithdraw->wallet_address,
                        'id' => $datawithdraw->withdraw_id,
                    ]; 

                    Mail::to($datawithuser->email)->send(new EmailWithdraw($details));
                    return back();
                
                }elseif(isset($request->unconfirmid)){
                        DB::table('withdraws')
                            ->where('withdraw_id', $request->unconfirmid)
                            ->update(['status' => 'PENDING']);
                            return back();
        
                    }elseif(isset($request->deleteid)){
                        DB::table('withdraws')
                        ->where('withdraw_id', $request->deleteid)
                        ->delete();
                        return back();
        
                    }else{
                    return view('admin.withdrawal')->with('datawithdraws', $datawithdraws);  

                }

        
    }
}
