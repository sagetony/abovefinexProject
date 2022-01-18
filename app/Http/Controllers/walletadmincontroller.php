<?php

namespace App\Http\Controllers;

use App\Mail\EmailDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class walletadmincontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
                $datawallets = DB::table('fundwallets')
                ->get();
                $datawallet = DB::table('fundwallets')
                ->where('transaction_id', $request->confirmid)
                ->first();
                if(isset($request->confirmid)){
                    DB::table('fundwallets')
                    ->where('transaction_id', $request->confirmid)
                    ->update(['status' => 'CONFIRM']);
                    //email....
                    $details = [
                        'name' => $datawallet->name,
                        'amount' => $datawallet->amount,
                        'id' => $datawallet->transaction_id,
                    ]; 

                    Mail::to($datawallet->email)->send(new EmailDeposit($details));

                    return back();
                
                }elseif(isset($request->unconfirmid)){
                        DB::table('fundwallets')
                            ->where('transaction_id', $request->unconfirmid)
                            ->update(['status' => 'PENDING']);
                            return back();
        
                    }elseif(isset($request->deleteid)){
                        DB::table('fundwallets')
                        ->where('transaction_id', $request->deleteid)
                        ->delete();
                        return back();
        
                    }else{
                    return view('admin.wallet')->with('datawallets', $datawallets);  

                }

        
    }
}
