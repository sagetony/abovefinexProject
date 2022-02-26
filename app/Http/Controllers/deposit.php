<?php

namespace App\Http\Controllers;

use App\Mail\EmailFunding;
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
            $datawitc =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Capital')
                    ->sum('amount');

       
  $datadepositi =  DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->sum('interestcap');

         $data = DB::table('fundwallets')
                    ->where('user_id', auth()->user()->userID)
                    ->sum('amount');
                    $datawitw =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'wallet')
                    ->sum('amount');
            $datarobot =  DB::table('robots')
                    ->where('userID', auth()->user()->userID)
                    ->sum('amount');
            $datasignal =  DB::table('signalbuys')
                    ->where('userID', auth()->user()->userID)
                    ->sum('amount');
        return view('user.deposit')->with('dataps', $dataps)->with('datacs', $datacs)->with('respBTC', $respBTC)->with('datadeposit', $datadeposit)->with('datawit', $datawit)->with('datawiti', $datawiti)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datapas', $datapas)->with('datadepositi', $datadepositi)->with('data', $data)->with('datas', $datas)->with('datawitw', $datawitw)->with('datawitc',  $datawitc)->with('datarobot', $datarobot)->with('datasignal', $datasignal);

    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }
    
    public function store(Request $request){
        $dataf = DB::table('fundwallets')
        ->where('user_id', auth()->user()->userID)
        ->sum('amount');
        $datawitw =  DB::table('withdraws')
            ->where('user_id', auth()->user()->userID)
            ->where('status', 'CONFIRM')
            ->where('type_withdraw', 'wallet')
            ->sum('amount');
        $datadeposit =  DB::table('deposits')
            ->where('userID', auth()->user()->userID)
            ->where('status', 'CONFIRM')
            ->sum('amount');
        $datasignal =  DB::table('signalbuys')
            ->where('userID', auth()->user()->userID)
            ->sum('amount');
            $datarobot =  DB::table('robots')
            ->where('userID', auth()->user()->userID)
            ->sum('amount');
        $data = 0 + $dataf - $datawitw - $datadeposit - $datasignal - $datarobot;
            $validator = Validator::make($request->all(), [
                'package'=>'required',
                
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
    //         return back()->with('toast_success', 'Investment successful !!');
    //        }else{
    //         return back()->with('toast_error', 'Insufficient Fund, Kindly Fund Your Wallet !!!');
    //     }
        
    // } 

            if($data >= 200){
        
                    // return dd('hs');
            
                                if(User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'NONE'){
                                    if($data >= 200 && $request->package == 'Regular 200'){
                                            
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>200,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>200,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                                            
                                        ]);    
                                                     // email....
                                       
                                                    $details = [
                                                        'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                        'amount' => 200,
                                                        'package' => $request->package,
                                                    ]; 
                                        
                                                    Mail::to(auth()->user()->email)->send(new EmailFunding($details));

                                            return back()->with('toast_success', 'Investment successful !!');
    
                                    }                                 
       
                            
                                        elseif($data >= 500 && $request->package == 'Regular 500'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>500,
                                                'coin'=>'',
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
                                                'amount'=>500,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                
                                                'plan'=>'Plan',
                                                'planAmount'=> 'Planamount',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 500,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');
    
                                        }
                                   
                           
                                        elseif($data >= 1000 && $request->package == 'Regular 1k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>1000,
                                                'coin'=>'',
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
                                                'amount'=> 1000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 1000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                        elseif($data >= 2000 && $request->package == 'Classic 2k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>2000,
                                                'coin'=>'',
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
                                                'amount'=>2000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                
                                                'plan'=>'Plan',
                                                'planAmount'=> 'Planamount',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 2000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');
    
                                        }
                                   
                           
                                        elseif($data >= 5000 && $request->package == 'Classic 5k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>5000,
                                                'coin'=>'',
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
                                                'amount'=> 5000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 5000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                
                                   
                           
                                        elseif($data >= 10000 && $request->package == 'Classic 10k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>10000,
                                                'coin'=>'',
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
                                                'amount'=> 10000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 10000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                   
                                        elseif($data >= 20000 && $request->package == 'Premium 20k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>20000,
                                                'coin'=>'',
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
                                                'amount'=> 20000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 20000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                        elseif($data >= 50000 && $request->package == 'Premium 50k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>50000,
                                                'coin'=>'',
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
                                                'amount'=>50000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                
                                                'plan'=>'Plan',
                                                'planAmount'=> 'Planamount',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 50000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');
    
                                        }
                                   
                           
                                        elseif($data >= 100000 && $request->package == 'Premium 100k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>100000,
                                                'coin'=>'',
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
                                                'amount'=> 100000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 100000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                   
                            
                                else{
                                    return back()->with('toast_error', 'Insufficient Fund');
                                }
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
                                         'type'=> 'Investment',
                                    ]);
                                    if(User::where('referral', $referral1)->exists() && auth()->user()->referral != 'NONE'){
                                        $datauser2 = User::where('referral',  $referral1)
                                                    ->get()->first();
                                                    
                                        $referral2 = $datauser2['referral'];
                                        $referee2 = $datauser2['username'];
                                        $referral2Amt = $request->amount *2/100;
            
                                        $datareferral2 = User::where('referral',  $referral2)
                                            ->get()->first();
                                            $referralname2 = $datareferral2['username'];
            
                                        bonus::create([
                                            'referral_id' => $referral2,
                                            'referralname'=> $referralname2,
                                            'referee' =>  $referee2,
                                            'amount' => $referral2Amt,
                                            'type'=> 'Investment',

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
                                                'type'=> 'Investment',

                                            ]);
                                            if(User::where('referral', $referral3)->exists() && auth()->user()->referral != 'NONE'){  

                                                $datauser4 = User::where('referral',  $referral3)
                                                            ->get()->first();
                                                            
                                                $referral4 = $datauser4['referral'];
                                                $referee4 = $datauser4['username'];
                                                $referral4Amt = $request->amount *1/100;
                                                $datareferral = User::where('referral',  $referral4)
                                                ->get()->first();
                                                $referralname = $datareferral['username'];
            
                                                bonus::create([
                                                    'referral_id' => $referral4,
                                                    'referralname'=> $referralname,
                                                    'referee' =>  $referee4,
                                                    'amount' => $referral4Amt,
                                                    'type'=> 'Investment',
                                            
                                                ]);
                                                    
                                                        if(User::where('referral', $referral4)->exists() && auth()->user()->referral != 'NONE'){  
        
                                                            $datauser5 = User::where('referral',  $referral4)
                                                                        ->get()->first();
                                                                        
                                                            $referral5 = $datauser5['referral'];
                                                            $referee5 = $datauser5['username'];
                                                            $referral5Amt = $request->amount *1/100;
                                                            $datareferral = User::where('referral',  $referral5)
                                                            ->get()->first();
                                                            $referralname = $datareferral['username'];
                        
                                                            bonus::create([
                                                                'referral_id' => $referral4,
                                                                'referralname'=> $referralname,
                                                                'referee' =>  $referee5,
                                                                'amount' => $referral5Amt,
                                                                'type'=> 'Investment',
                                                        
                                                            ]);
                                                                }else{
                                                                    return back();
                                                                    }
                                                        }else{
                                                            return back();
                                                            }
                                    
                                }else{
                                    return back();
                                }
                            }  else{
                                    return back();
                                        }
                        }        else
                                {
                                    if($data >= 200 && $request->package == 'Regular 200'){
                                            
                                        ModelsDeposit::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>200,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                        ]);    
                                        transaction::create([
                                            'transaction_id'=> $this->randomDigit(),
                                            'userID'=> auth()->user()->userID,
                                            'username' =>auth()->user()->username,
                                            'amount'=>200,
                                            'coin'=>'Coin',
                                            'packages' =>$request->package,
            
                                            'plan'=>'Plan',
                                            'planAmount'=> 'Planamount',
                                            'interest'=> 0,
                                            'status'=>'CONFIRM',
                                            'dayCounter'=> 0,
                                            'interestcap' => 0,
            
                                                            
                                        ]);    
                                                     // email....
                                       
                                                    $details = [
                                                        'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                        'amount' => 200,
                                                        'package' => $request->package,
                                                    ]; 
                                        
                                                    Mail::to(auth()->user()->email)->send(new EmailFunding($details));

                                            return back()->with('toast_success', 'Investment successful !!');
    
                                    }                                 
       
                            
                                        elseif($data >= 500 && $request->package == 'Regular 500'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>500,
                                                'coin'=>'',
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
                                                'amount'=>500,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                
                                                'plan'=>'Plan',
                                                'planAmount'=> 'Planamount',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 500,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');
    
                                        }
                                   
                           
                                        elseif($data >= 1000 && $request->package == 'Regular 1k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>1000,
                                                'coin'=>'',
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
                                                'amount'=> 1000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 1000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                        elseif($data >= 2000 && $request->package == 'Classic 2k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>2000,
                                                'coin'=>'',
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
                                                'amount'=>2000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                
                                                'plan'=>'Plan',
                                                'planAmount'=> 'Planamount',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 2000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');
    
                                        }
                                   
                           
                                        elseif($data >= 5000 && $request->package == 'Classic 5k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>5000,
                                                'coin'=>'',
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
                                                'amount'=> 5000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 5000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                
                                   
                           
                                        elseif($data >= 10000 && $request->package == 'Classic 10k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>10000,
                                                'coin'=>'',
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
                                                'amount'=> 10000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 10000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                   
                                        elseif($data >= 20000 && $request->package == 'Premium 20k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>20000,
                                                'coin'=>'',
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
                                                'amount'=> 20000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 20000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                        elseif($data >= 50000 && $request->package == 'Premium 50k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>50000,
                                                'coin'=>'',
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
                                                'amount'=>50000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                
                                                'plan'=>'Plan',
                                                'planAmount'=> 'Planamount',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 50000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');
    
                                        }
                                   
                           
                                        elseif($data >= 100000 && $request->package == 'Premium 100k'){
                                            ModelsDeposit::create([
                                                'transaction_id'=> $this->randomDigit(),
                                                'userID'=> auth()->user()->userID,
                                                'username' =>auth()->user()->username,
                                                'amount'=>100000,
                                                'coin'=>'',
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
                                                'amount'=> 100000,
                                                'coin'=>'',
                                                'packages' =>$request->package,
                                                'plan'=>'Plan',
                                                'planAmount'=> 'PLANAMOUNT',
                                                'interest'=> 0,
                                                'status'=>'CONFIRM',
                                                'dayCounter'=> 0,
                                                'interestcap' => 0,
                                
                                            ]);    
                                             // email....
                                       
                                             $details = [
                                                'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                                                'amount' => 100000,
                                                'package' => $request->package,
                                            ]; 
                                
                                            Mail::to(auth()->user()->email)->send(new EmailFunding($details));
                                            return back()->with('toast_success', 'Investment successful !!');  
                                        }
                                   
                            
                                else{
                                    return back()->with('toast_error', 'Insufficient Fund');
                                }
                                         
                                }
                        
                    
            }else{
                    return back()->with('toast_error', 'Insufficient Fund, Kindly Fund Your Wallet !!!');

            }
             
    }
}
