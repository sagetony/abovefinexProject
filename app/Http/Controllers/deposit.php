<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\bonus;
use App\Models\deposit as ModelsDeposit;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class deposit extends Controller
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
                
        $datapas =  DB::table('packages')->get();
             
       $dataps =  DB::table('plans')->get();
       $datas = DB::table('packages')->get();

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
                    $databonus =  DB::table('bonuses')
                    ->where('referralname', auth()->user()->username)
                    ->sum('amount');
            
  $datawiti =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Interest')
                    ->sum('amount');

       
  $datadepositi =  DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->sum('interestcap');

         $data = DB::table('fundwallets')
                    ->where('user_id', auth()->user()->userID)
                    ->sum('amount');


        return view('user.deposit')->with('dataps', $dataps)->with('datacs', $datacs)->with('respBTC', $respBTC)->with('datadeposit', $datadeposit)->with('datawit', $datawit)->with('datawiti', $datawiti)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datapas', $datapas)->with('datadepositi', $datadepositi)->with('data', $data)->with('datas', $datas);

    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }
    
    public function store(Request $request){
        $data = DB::table('fundwallets')
            ->where('user_id', auth()->user()->userID)
            ->sum('amount');
        $validator = Validator::make($request->all(), [
            'package'=>'required',
            'amount'=>'required',
            ]);

       if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

       }
    //    if (ModelsDeposit::where('userID', auth()->user()->userID)->exists()) {
        
    //        if($data >= $request->amount){
                        
    //         transaction::create([
    //             'transaction_id'=> $this->randomDigit(),
    //             'userID'=> auth()->user()->userID,
    //             'username' =>auth()->user()->username,
    //             'amount'=>$request->amount,
    //             'coin'=>'Coin',
    //             'packages' =>$request->package,

    //             'plan'=>'Plan',
    //             'planAmount'=> 'TopUp',
    //             'interest'=> 0,
    //             'status'=>'TopUp',
    //             'dayCounter'=> 0,
    //             'interestcap' => 0,

    //         ]);   
    //         return back()->with('toast_success', 'Investment Successfull !!');
    //        }else{
    //         return back()->with('toast_error', 'Insufficient Fund, Kindly Fund Your Wallet !!!');
    //     }
        
    // } 

            if($data >= $request->amount){
                if(ModelsDeposit::where('userID', auth()->user()->userID)->doesntExist()){
        
                    // return dd('hs');
            
                                if(User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'NONE'){
                                    $datauser1 = User::where('userID', auth()->user()->userID)
                                    ->get()->first();
            
                                    $referral1 = $datauser1['referral'];
                                    $referee = $datauser1['username'];
                                    $referral1Amt = $request->amount *5/100;
            
                                    $datareferral1 = User::where('refereeID',  $referral1)
                                    ->get()->first();
                                    $referralname1 = $datareferral1['username'];
            
                                    bonus::create([
                                        'referralID' => $referral1,
                                        'referralname'=> $referralname1,
                                        'referee' =>  $referee,
                                        'amount' => $referral1Amt,
                                    ]);
                                    if(User::where('referral', $referral1)->exists() && auth()->user()->referral != 'NONE'){
                                        $datauser2 = User::where('referral',  $referral1)
                                                    ->get()->first();
                                                    
                                        $referral2 = $datauser2['referral'];
                                        $referee2 = $datauser2['username'];
                                        $referral2Amt = $request->amount *3/100;
            
                                        $datareferral2 = User::where('referral',  $referral2)
                                            ->get()->first();
                                            $referralname2 = $datareferral2['username'];
            
                                        bonus::create([
                                            'referral_id' => $referral2,
                                            'referralname'=> $referralname2,
                                            'referee' =>  $referee2,
                                            'amount' => $referral2Amt,
                                        ]);
            
                                        if(User::where('referral', $referral2)->exists() && auth()->user()->referral != 'NONE'){  
            
                                            $datauser3 = User::where('referral',  $referral2)
                                                        ->get()->first();
                                                        
                                            $referral3 = $datauser3['referral'];
                                            $referee3 = $datauser3['username'];
                                            $referral3Amt = $request->amount *2/100;
                                            $datareferral = User::where('referral',  $referral3)
                                            ->get()->first();
                                            $referralname = $datareferral['username'];
            
                                            bonus::create([
                                                'referral_id' => $referral3,
                                                'referralname'=> $referralname,
                                                'referee' =>  $referee3,
                                                'amount' => $referral3Amt,
                                            ]);
                                    
            
                                    
                                        if($request->amount >= 100 && $request->amount < 10000 && $request->package == 'Regular'){
                                            
                                                ModelsDeposit::create([
                                                    'transaction_id'=> $this->randomDigit(),
                                                    'userID'=> auth()->user()->userID,
                                                    'username' =>auth()->user()->username,
                                                    'amount'=>$request->amount,
                                                    'coin'=>'Coin',
                                                    'packages' =>$request->package,
                    
                                                    'plan'=>'Plan',
                                                    'planAmount'=> 'Planamount',
                                                    'interest'=> 0,
                                                    'status'=>'PENDING',
                                                    'dayCounter'=> 0,
                                                    'interestcap' => 0,
                    
                                                ]);    
                                                transaction::create([
                                                    'transaction_id'=> $this->randomDigit(),
                                                    'userID'=> auth()->user()->userID,
                                                    'username' =>auth()->user()->username,
                                                    'amount'=>$request->amount,
                                                    'coin'=>'Coin',
                                                    'packages' =>$request->package,
                    
                                                    'plan'=>'Plan',
                                                    'planAmount'=> 'Planamount',
                                                    'interest'=> 0,
                                                    'status'=>'CONFIRM',
                                                    'dayCounter'=> 0,
                                                    'interestcap' => 0,
                    
                                                                    
                                                ]);    
                                                    return back()->with('toast_success', 'Investment Successfull !!');
            
                                            }
                                                            
               
                                    
                                                elseif($request->amount >= 10000 && $request->amount < 100000 && $request->package == 'Classic'){
                                                    ModelsDeposit::create([
                                                        'transaction_id'=> $this->randomDigit(),
                                                        'userID'=> auth()->user()->userID,
                                                        'username' =>auth()->user()->username,
                                                        'amount'=>$request->amount,
                                                        'coin'=>$request->coin,
                                                        'packages' =>$request->package,
                                                        'plan'=>'Plan',
                                                        'planAmount'=> 'PlanAmount',
                                                        'interest'=> 0,
                                                        'status'=>'CONFIRM',
                                                        'dayCounter'=> 0,
                                                        'interestcap' => 0,
                        
                                                    ]);    
                                                    transaction::create([
                                                        'transaction_id'=> $this->randomDigit(),
                                                        'userID'=> auth()->user()->userID,
                                                        'username' =>auth()->user()->username,
                                                        'amount'=>$request->amount,
                                                        'coin'=>$request->coin,
                                                        'packages' =>$request->package,
                                        
                                                        'plan'=>'Plan',
                                                        'planAmount'=> 'Planamount',
                                                        'interest'=> 0,
                                                        'status'=>'CONFIRM',
                                                        'dayCounter'=> 0,
                                                        'interestcap' => 0,
                                        
                                                    ]);    
                                                    return back()->with('toast_success', 'Investment Successfull !!');
            
                                                }
                                           
                                   
                                                elseif($request->amount >= 100000 && $request->amount < 10000000 && $request->package == 'Premium'){
                                                    ModelsDeposit::create([
                                                        'transaction_id'=> $this->randomDigit(),
                                                        'userID'=> auth()->user()->userID,
                                                        'username' =>auth()->user()->username,
                                                        'amount'=>$request->amount,
                                                        'coin'=>$request->coin,
                                                        'packages' =>$request->package,
                                                        'plan'=>'Plan',
                                                        'planAmount'=> 'PLANAMOUNT',
                                                        'interest'=> 0,
                                                        'status'=>'CONFIRM',
                                                        'dayCounter'=> 0,
                                                        'interestcap' => 0,
                        
                                                    ]);    
                                                    transaction::create([
                                                        'transaction_id'=> $this->randomDigit(),
                                                        'userID'=> auth()->user()->userID,
                                                        'username' =>auth()->user()->username,
                                                        'amount'=>$request->amount,
                                                        'coin'=>$request->coin,
                                                        'packages' =>$request->package,
                                                        'plan'=>'Plan',
                                                        'planAmount'=> 'PLANAMOUNT',
                                                        'interest'=> 0,
                                                        'status'=>'CONFIRM',
                                                        'dayCounter'=> 0,
                                                        'interestcap' => 0,
                                        
                                                    ]);    
                                                    return back()->with('toast_success', 'Investment Successfull !!');  
                                                }
                                           
                                    
                                        else{
                                            return back()->with('toast_error', 'Invalid Amount. Please Check The Amount And Package Again Before Investing!!');
                                        }
                                }else{
                                    return back();
                                }
                            }  else{
                                return back();
                            }
                        }        else
                                {
                                    if($request->amount >= 100 && $request->amount < 10000 && $request->package == 'Regular'){
                                                            
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'PENDING',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                                            
                                        ]);    
                                            return back()->with('toast_success', 'Investment Successfull !!');
            
                                    }
                                                    
            
            
                                    elseif($request->amount >= 10000 && $request->amount < 100000 && $request->package == 'Classic'){
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                                            'plan'=>'Plan',
                                            'planAmount'=> 'PlanAmount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
                            
                                        ]);    
                                        return back()->with('toast_success', 'Investment Successfull !!');
            
                                    }
            
            
                                    elseif($request->amount >= 100000 && $request->amount < 10000000 && $request->package == 'Premium'){
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                                            'plan'=>'Plan',
                                            'planAmount'=> 'PLANAMOUNT',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                                            'plan'=>'Plan',
                                            'planAmount'=> 'PLANAMOUNT',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
                            
                                        ]);    
                                        return back()->with('toast_success', 'Investment Successfull !!');  
                                    }
            
            
                                        else{
                                            return back()->with('toast_error', 'Invalid Amount. Please Check The Amount And Package Again Before Investing!!');
                                        }
                                         
                                }
                        } 
                    else
                        {
                                    if($request->amount >= 100 && $request->amount < 10000 && $request->package == 'Regular'){
                                                            
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'PENDING',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                                            
                                        ]);    
                                            return back()->with('toast_success', 'Investment Successfull !!');
            
                                    }
                                                    
            
            
                                    elseif($request->amount >= 10000 && $request->amount < 100000 && $request->package == 'Classic'){
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                                            'plan'=>'Plan',
                                            'planAmount'=> 'PlanAmount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
                            
                                        ]);    
                                        return back()->with('toast_success', 'Investment Successfull !!');
            
                                    }
            
            
                                    elseif($request->amount >= 100000 && $request->amount < 10000000 && $request->package == 'Premium'){
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                                            'plan'=>'Plan',
                                            'planAmount'=> 'PLANAMOUNT',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>$request->amount,
                                            'coin'=>$request->coin,
                                            'packages' =>$request->package,
                                            'plan'=>'Plan',
                                            'planAmount'=> 'PLANAMOUNT',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
                            
                                        ]);    
                                        return back()->with('toast_success', 'Investment Successfull !!');  
                                    }
            
            
                                        else{
                                            return back()->with('toast_error', 'Invalid Amount. Please Check The Amount And Package Again Before Investing!!');
                                        }
                                    
                        }  
            }else{
                    return back()->with('toast_error', 'Insufficient Fund, Kindly Fund Your Wallet !!!');

            }
             
    }
}
