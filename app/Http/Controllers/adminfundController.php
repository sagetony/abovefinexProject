<?php

namespace App\Http\Controllers;

use App\Mail\EmailFunding;
use App\Models\deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class adminfundController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
                $datadeposits = DB::table('transactions')
                ->get();

               

                if(isset($request->confirmid)){
                    $datadepo = DB::table('transactions')
                        ->where('transaction_id', $request->confirmid)
                        ->first();
                    $datadepo2 = DB::table('deposits')
                        ->where('userID', $datadepo->userID)
                        ->first();
                    $datauser = DB::table('users')
                        ->where('username', $datadepo->username)
                        ->first();

                        if(deposit::where('userID', $datadepo->userID)->exists() && $datadepo2->status == 'CONFIRM'){
                            $amount = $datadepo->amount +  $datadepo2->amount;

                            if($amount >= 5000 && $datadepo2->packages == 'Cryptocurrency'){
                                DB::table('deposits')
                                ->where('userID', $datadepo->userID)
                                ->update(['amount' => $amount, 'plan' => 'High Frequency', 'planAmount'=> 1.25]);
    
                                return back();

                            }elseif($amount >= 50000 && $datadepo2->packages == 'Cryptocurrency'){
                                DB::table('deposits')
                                ->where('userID', $datadepo->userID)
                                ->update(['amount' => $amount, 'plan' => 'Contract', 'planAmount'=> 2]);
    
                                return back();
                            }elseif($amount >= 1860 && $datadepo2->packages == 'Gold'){
                                DB::table('deposits')
                                ->where('userID', $datadepo->userID)
                                ->update(['amount' => $amount, 'plan' => 'Oonze', 'planAmount'=> 1.18]);
    
                                return back();
                            }elseif($amount >= 50000 && $datadepo2->packages == 'Gold'){
                                DB::table('deposits')
                                ->where('userID', $datadepo->userID)
                                ->update(['amount' => $amount, 'plan' => 'Kilogram', 'planAmount'=> 2]);
    
                                return back();
                            }else{
                                DB::table('deposits')
                                ->where('userID', $datadepo->userID)
                                ->update(['amount' => $amount]);
    
                                return back();
                            }
                        

                        }else{
                            DB::table('transactions')
                            ->where('transaction_id', $request->confirmid)
                            ->update(['status' => 'CONFIRM']);
                            DB::table('deposits')
                            ->where('userID', $datadepo->userID)
                            ->update(['status' => 'CONFIRM']);
                            // email....
        
                            $details = [
                                'name' => $datauser->firstname. ' '  .$datauser->lastname,
                                'amount' => $datadepo->amount,
                                'plan' => $datadepo->plan,
                                'id' => $datadepo->transaction_id,
                            ]; 
        
                            Mail::to($datauser->email)->send(new EmailFunding($details));
        
                            return back();
                        }

                   
                
                }elseif(isset($request->unconfirmid)){
                    $datadepo = DB::table('transactions')
                    ->where('transaction_id', $request->unconfirmid)
                    ->first();
                $datadepo2 = DB::table('deposits')
                    ->where('userID', $datadepo->userID)
                    ->first();
                        DB::table('transactions')
                            ->where('transaction_id', $request->unconfirmid)
                            ->update(['status' => 'PENDING']);
                            DB::table('deposits')
                            ->where('userID', $datadepo->userID)
                            ->update(['status' => 'PENDING']);
                            return back();
        
                    }elseif(isset($request->deleteid)){
                        DB::table('transactions')
                        ->where('transaction_id', $request->deleteid)
                        ->delete();
                        return back();
        
                    }else{
                    return view('admin.adminfunding')->with('datadeposits', $datadeposits);  

                }

        
    }
}
