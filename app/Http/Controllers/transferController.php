<?php

namespace App\Http\Controllers;

use App\Models\deposit;
use App\Models\transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class transferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $datadeposit =  DB::table('deposits')
        ->where('userID', auth()->user()->userID)
        ->where('status', 'CONFIRM')
        ->sum('amount');

        $datainterest =  DB::table('deposits')
        ->where('userID', auth()->user()->userID)
        ->where('status', 'CONFIRM')
        ->sum('interest');

        $databonus =  DB::table('bonuses')
        ->where('referralname', auth()->user()->username)
        ->sum('amount');

        $datawit =  DB::table('withdraws')
        ->where('user_id', auth()->user()->userID)
        ->where('status', 'CONFIRM')
        ->sum('amount');
        $datadepositi =  DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->sum('interestcap');
                    $data = DB::table('fundwallets')
                    ->where('user_id', auth()->user()->userID)
                    ->sum('amount');

        $datawiti =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Interest')
                    ->sum('amount');
        $datawitc =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Capital')
                    ->sum('amount');
        $datawitw =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'wallet')
                    ->sum('amount');
        $dataaccount = DB::table('accounts')->where('userID', auth()->user()->userID)->first();
        


        return view('user.transfer')->with('datadeposit', $datadeposit)->with('datawit', $datawit)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datadepositi', $datadepositi)->with('data', $data)->with('datawiti', $datawiti)->with('dataaccount', $dataaccount)->with('datawitw', $datawitw)->with('datawitc',  $datawitc);

        
    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789"), 0, 11);
        return $pass;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'amount'=>'required',
            'username'=>'required',
            'transfer_type'=>'required',
            ]);

       if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

       }
                    if(auth()->user()->username == $request->username){
                        if($request->transfer_type != 'wallet'){
                                if($request->transfer_type == 'bonus'){
                                            $data = DB::table('fundwallets')
                                            ->where('user_id', auth()->user()->userID)
                                            ->sum('amount');
                                            $new_amount = $data + $request->amount;
                                            DB::table('fundwallets')->where('user_id', auth()->user()->userID)->update([
                                                    'amount' => $new_amount,
                                            ]);
                                            transfer::create([
                                                'transferID' => $this->randomDigit(),
                                                'userID' => auth()->user()->userID,
                                                'receiver' => $request->username,
                                                'amount' => $request->amount,
                                                'source' => $request->transfer_type,
                                                'status' => 'CONFIRM',
                                            ]);
                            
                                        return back()->with('toast_success', 'Transfer was successful');
                    
                                }elseif($request->transfer_type == 'interest'){
                                                $data = DB::table('fundwallets')
                                                ->where('user_id', auth()->user()->userID)
                                                ->sum('amount');
                                                $new_amount = $data + $request->amount;
                                                DB::table('fundwallets')->where('user_id', auth()->user()->userID)->update([
                                                        'amount' => $new_amount,
                                                ]);
                                                transfer::create([
                                                    'transferID' => $this->randomDigit(),
                                                    'userID' => auth()->user()->userID,
                                                    'receiver' => $request->username,
                                                    'amount' => $request->amount,
                                                    'source' => $request->transfer_type,
                                                    'status' => 'CONFIRM',
                                                ]);
                                
                                            return back()->with('toast_success', 'Transfer was successful');
                                }
                        }else{
                            return back()->with('toast_error', 'This transfer cannot be made. Check your options correctly');

                        }
                    }else{
                        if(User::where('username', $request->username)->exists()){
                                    if($request->transfer_type == 'bonus' || $request->transfer_type == 'interest' || $request->transfer_type == 'wallet'){

                                        $datan = DB::table('users')->where('username', $request->username)->get()->first();
                                        
                                        $data = DB::table('fundwallets')
                                        ->where('user_id', $datan['userID'])
                                        ->sum('amount');
                                        $new_amount = $data + $request->amount;
                                        DB::table('fundwallets')->where('user_id',  $datan['userID'])->update([
                                                'amount' => $new_amount,
                                        ]);
                                        transfer::create([
                                            'transferID' => $this->randomDigit(),
                                            'userID' => auth()->user()->userID,
                                            'receiver' => $request->username,
                                            'amount' => $request->amount,
                                            'source' => $request->transfer_type,
                                            'status' => 'CONFIRM',
                                        ]);
                        
                                    return back()->with('toast_success', 'Transfer was successful');
        
                            }
                        }else{
                            return back()->with('toast_error', 'Invalid Username');
                        }
                    }
                transfer::create([
                    'transferID' => $this->randomDigit(),
                    'userID' => auth()->user()->userID,
                    'receiver' => $request->username,
                    'amount' => $request->amount,
                    'source' => $request->transfer_type,
                    'status' => 'CONFIRM',
            ]);

            return back()->with('toast_success', 'Transfer was successful');

    }


    
}
