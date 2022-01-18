<?php

namespace App\Http\Controllers;

use App\Mail\EmailFunding;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class edituser extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        $datadeposits = DB::table('deposits')
                        ->where('userID', $id)
                        ->get();
        if(isset($id) || isset($request->confirmid) || isset($request->unconfirmid) || isset($request->deleteid)){
            $data = DB::table('users')->where('userID', $id)->get();
            $datad = DB::table('deposits')->where('userID', $id)->sum('amount');
            $datai = DB::table('deposits')->where('userID', $id)->sum('interest');
            $datab = DB::table('users')->where('userID', $id)->get();
            $databon = DB::table('bonuses')->where('referralID', $datab[0]->refereeID)->sum('amount');
            if(isset($request->confirmid)){
                $datadepo = DB::table('deposits')
                    ->where('transaction_id', $request->confirmid)
                    ->first();
                
                $datauser = DB::table('users')
                    ->where('username', $datadepo->username)
                    ->first();

                DB::table('deposits')
                ->where('transaction_id', $request->confirmid)
                ->update(['status' => 'CONFIRM']);
                // email....

                $details = [
                    'name' => $datauser->firstname. ' '  .$datauser->lastname,
                    'amount' => $datadepo->amount,
                    'plan' => $datadepo->plan,
                    'id' => $datadepo->transaction_id,
                ]; 

                Mail::to($datauser->email)->send(new EmailFunding($details));

                return redirect()->route('edituser', ['id'=>$request->id]);
            
            }elseif(isset($request->unconfirmid)){
                    DB::table('deposits')
                        ->where('transaction_id', $request->unconfirmid)
                        ->update(['status' => 'PENDING']);
                        return back();
    
                }elseif(isset($request->deleteid)){
                    DB::table('deposits')
                    ->where('transaction_id', $request->deleteid)
                    ->delete();
                    return redirect()->route('edituser', ['id'=>$request->id]);
    
                }else{
                    return view('admin.edituser')->with('data', $data)->with('datad', $datad)->with('datai', $datai)->with('databon', $databon)->with('datadeposits', $datadeposits);
            }
    
           
        }else{
                // return redirect()->route('adminusers');
        }
       
    }

    public function store(Request $request){
        
        DB::table('users')
        ->where('userID', $request->id)
        ->update([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'country' => $request->country,
            'password' => Hash::make($request->password),
            'passwordh' => $request->password,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
       
       
        return back()->with('toast_success', 'Profile has been updated');
    }
}
