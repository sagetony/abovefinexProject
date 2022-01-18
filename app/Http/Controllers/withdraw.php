<?php

namespace App\Http\Controllers;

use App\Models\withdraw as ModelsWithdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class withdraw extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
        $ch = curl_init('https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        //$exchangeRates = json_decode($json);
        $respBTC = json_decode($json);

        $datacs =  DB::table('coins')->get();

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

        return view('user.withdraw')->with('respBTC', $respBTC)->with('datacs', $datacs)->with('datadeposit', $datadeposit)->with('datawit', $datawit)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datadepositi', $datadepositi);


    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'wallet' => 'required',
            'type' => 'required',
            'coin' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

    
        }
        $datai = DB::table('deposits')
                ->where('userID', auth()->user()->userID)
                ->where('status', 'CONFIRM')
                ->get();
    
            if($request->type == 'Bonus'){
                $databonus = DB::table('bonuses')
                ->where('referralname', auth()->user()->username)
                ->where('amount', '>', 0)
                ->sum('amount');
    
                $withbon = DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Bonus')
                    ->sum('amount'); 
                $newbon =  $databonus - $withbon;
                if($newbon >= $request->amount){
    
                 if($request->amount >= 50){
                    ModelsWithdraw::create([
                        'withdraw_id' => $this->randomDigit(),
                        'user_id'=> auth()->user()->userID,
                        'username' => auth()->user()->username,
                        'amount' => $request->amount,
                        'username' => auth()->user()->username,
                        'wallet_address' => $request->wallet,
                        'coin' => $request->coin,
                        'type_withdraw' => $request->type,
                        'status' => 'PENDING',
                    ]);
                    return back()->with('toast_success', 'Withdrawal has been created');
                 }else{
                    return back()->with('toast_error', 'Minimum Withdrawal is $50');
    
                }
    
                }else{
                    return back()->with('toast_error', 'Insufficient fund for withdrawal');
    
                }
            }elseif($request->type == 'Interest'){
                $datainterest = DB::table('deposits')
                ->where('userID', auth()->user()->userID)
                ->where('status', 'CONFIRM')
                ->where('interest', '>', 0)
                ->sum('interest');
    
                $withint = DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Interest')
                    ->sum('amount'); 
                $newint =  $datainterest - $withint;
                if($newint >= $request->amount){
    
                    $dataint = DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('interest', '>', 0)
                    ->sum('interest');
                    if($dataint > 0){
                        if($request->amount >= 50){
                            ModelsWithdraw::create([
                                'withdraw_id' => $this->randomDigit(),
                                'user_id'=> auth()->user()->userID,
                                'username' => auth()->user()->username,
                                'amount' => $request->amount,
                                'username' => auth()->user()->username,
                                'wallet_address' => $request->wallet,
                                'coin' => $request->coin,
                                'type_withdraw' => $request->type,
                                'status' => 'PENDING',
                            ]);
                            return back()->with('toast_success', 'Withdrawal has been created');
                         }else{
                            return back()->with('toast_error', 'Minimum Withdrawal is $50');
                         }
                    }else{
                        return back()->with('toast_error', 'Interest not yet matured');
    
                    }
                }else{
                    return back()->with('toast_error', 'Insufficient fund for withdrawal');
    
                }
            }elseif($request->type == 'Capital'){
                $datacapital = DB::table('deposits')
                ->where('userID', auth()->user()->userID)
                ->where('status', 'CONFIRM')
                ->where('amount', '>', 0)
                ->sum('amount');
    
                $withcap = DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Capital')
                    ->sum('amount'); 
                $newcap =  $datacapital - $withcap;
                if($newcap >= $request->amount){
    
                    $datacap = DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('amount', '>', 0)
                    ->where('dayCounter', '>=', 90)
                    ->sum('amount');
                    if($datacap > 0){
                        if($request->amount >= 50){
                            ModelsWithdraw::create([
                                'withdraw_id' => $this->randomDigit(),
                                'user_id'=> auth()->user()->userID,
                                'username' => auth()->user()->username,
                                'amount' => $request->amount,
                                'username' => auth()->user()->username,
                                'wallet_address' => $request->wallet,
                                'coin' => $request->coin,
                                'type_withdraw' => $request->type,
                                'status' => 'PENDING',
                            ]);
                            return back()->with('toast_success', 'Withdrawal has been created');
                         }else{
                            return back()->with('toast_error', 'Minimum Withdrawal is $50');
                         }
                    }else{
                        return back()->with('toast_error', "Capital can't be withdraw until 90days");
    
                    }
                }
            
            
            }
       

        

    }
}
