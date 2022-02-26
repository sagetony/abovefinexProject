<?php

namespace App\Http\Controllers;

use App\Mail\robot as MailRobot;
use App\Models\bonus;
use App\Models\robot as ModelsRobot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class robot extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $robots = DB::table('robots')->where('userID', auth()->user()->userID)->where('plan', 'Activation')
        ->get();
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
                    $datasignal =  DB::table('signalbuys')
                    ->where('userID', auth()->user()->userID)
                    ->sum('amount');
                    $datarobot =  DB::table('robots')
                    ->where('userID', auth()->user()->userID)
                    ->sum('amount');
            return view('user.robot')->with('datadeposit', $datadeposit)->with('datawit', $datawit)->with('datawiti', $datawiti)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datadepositi', $datadepositi)->with('data', $data)->with('datawitw', $datawitw)->with('datawitc',  $datawitc)->with('datasignal', $datasignal)->with('datarobot', $datarobot)->with('robots', $robots);    
    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }
    public function robotactivation(Request $request){
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
                    // 'signalplan'=>'required',
                    // 'amount'=>'required',
                    ]);

            if($validator->fails()){
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

            }
            if($data >= 200){


                if(User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'NONE'){
                    ModelsRobot::create([
                        'robotID' => $this->randomDigit(),
                        'userID' => auth()->user()->userID,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
                        'referral' => auth()->user()->referral,
                        'plan' => 'Activation',
                        'phone' => auth()->user()->phone,
                        'status' => 'PROCESSING',
                        'amount' => 200,
                        'daycounter' => 30,
                        'broker' => 'Broker',
                        'tradingID' => 'id',
                        'tradingpassword' => 'password',
                    ]);
                   
                        // email....
                       $ddd = DB::table('robots')->where('userID', auth()->user()->userID)->latest()->first();

                     $details = [
                        'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                        'id' => $ddd->robotID,
                        
                    ]; 
        
                    Mail::to(auth()->user()->email)->send(new MailRobot($details));
                    
                    return back()->with('toast_success', 'You Have Activated Your Robot Offer!! Kindly Check Your Mail To Connect Your Trading Account!!');

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
                        'type'=> 'Robot',
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
                            'type'=> 'Robot',
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
                                'type'=> 'Robot',
                        
                            ]);
                                }else{
                                 return back();
                                }
                        }  
                        else    {
                                    return back();
                                }
                }else{
                    ModelsRobot::create([
                        'robotID' => $this->randomDigit(),
                        'userID' => auth()->user()->userID,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
                        'referral' => auth()->user()->referral,
                        'plan' => 'Activation',
                        'phone' => auth()->user()->phone,
                        'status' => 'PROCESSING',
                        'amount' => 200,
                        'daycounter' => 30,
                        'broker' => 'Broker',
                        'tradingID' => 'id',
                        'tradingpassword' => 'password',
                    ]);
                   // email....
                   $ddd = DB::table('robots')->where('userID', auth()->user()->userID)->latest()->first();

                   $details = [
                      'name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                      'id' => $ddd->robotID,
                      
                  ]; 
      
                  Mail::to(auth()->user()->email)->send(new MailRobot($details));
                  
                        
                    return back()->with('toast_success', 'You Have Activated Your Robot Offer!! Kindly Check Your Mail To Connect Your Trading Account!!');

                }
                    
            }else{
                return redirect()->route('fund')->with('toast_error', 'Kindly Fund Your Wallet !!');

            }
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
                    // 'signalplan'=>'required',
                    // 'amount'=>'required',
                    ]);

            if($validator->fails()){
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

            }
            $dr = DB::table('robots')->where('robotID', $request->id)->first();

            if($dr == null){
                $robots = DB::table('robots')->where('userID', auth()->user()->userID)->where('plan', 'Activation')
                ->get();
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
                            $datasignal =  DB::table('signalbuys')
                            ->where('userID', auth()->user()->userID)
                            ->sum('amount');
                            $datarobot =  DB::table('robots')
                            ->where('userID', auth()->user()->userID)
                            ->sum('amount');
                    return view('user.robot')->with('datadeposit', $datadeposit)->with('datawit', $datawit)->with('datawiti', $datawiti)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datadepositi', $datadepositi)->with('data', $data)->with('datawitw', $datawitw)->with('datawitc',  $datawitc)->with('datasignal', $datasignal)->with('datarobot', $datarobot)->with('robots', $robots);
            }else{
                if($data >= 50){

                    $dr = DB::table('robots')->where('robotID', $request->id)->first();

                if(User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'NONE'){
                    if($dr->daycounter == 0 ){
                        ModelsRobot::create([

                            'robotID' => $dr->robotID,
                            'userID' => auth()->user()->userID,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'referral' => auth()->user()->referral,
                            'plan' => 'Renew',
                            'phone' => auth()->user()->phone,
                            'status' => 'PROCESSING',
                            'amount' => 50,
                            'daycounter' => 30,
                            'broker' => $dr->broker,
                            'tradingID' => $dr->tradingID,
                            'tradingpassword' => $dr->tradingpassword,
                        ]);
                       
                        DB::table('robots')->where('robotID', $request->id)->update([
                            'daycounter' => 0,   
                           ]);
                        return back()->with('toast_success', 'You Have Renewed Your Robot Offer!!');
    
                        $datauser1 = User::where('userID', auth()->user()->userID)
                        ->get()->first();
    
                        $referral1 = $datauser1['referral'];
                        $referee = $datauser1['username'];
                        $referral1Amt = $request->amount *10/100;
    
                        $datareferral1 = User::where('refereeID',  $referral1)
                        ->get()->first();
                        $referralname1 = $datareferral1['username'];
    
                        bonus::create([
                            'referralID' => $referral1,
                            'referralname'=> $referralname1,
                            'referee' =>  $referee,
                            'amount' => $referral1Amt,
                            'type'=> 'Robot',
                        ]);
                        if(User::where('referral', $referral1)->exists() && auth()->user()->referral != 'NONE'){
                            $datauser2 = User::where('referral',  $referral1)
                                        ->get()->first();
                                        
                            $referral2 = $datauser2['referral'];
                            $referee2 = $datauser2['username'];
                            $referral2Amt = $request->amount *5/100;
    
                            $datareferral2 = User::where('referral',  $referral2)
                                ->get()->first();
                                $referralname2 = $datareferral2['username'];
    
                            bonus::create([
                                'referral_id' => $referral2,
                                'referralname'=> $referralname2,
                                'referee' =>  $referee2,
                                'amount' => $referral2Amt,
                                'type'=> 'Robot',
                            ]);
    
                            if(User::where('referral', $referral2)->exists() && auth()->user()->referral != 'NONE'){  
    
                                $datauser3 = User::where('referral',  $referral2)
                                            ->get()->first();
                                            
                                $referral3 = $datauser3['referral'];
                                $referee3 = $datauser3['username'];
                                $referral3Amt = $request->amount *5/100;
                                $datareferral = User::where('referral',  $referral3)
                                ->get()->first();
                                $referralname = $datareferral['username'];
    
                                bonus::create([
                                    'referral_id' => $referral3,
                                    'referralname'=> $referralname,
                                    'referee' =>  $referee3,
                                    'amount' => $referral3Amt,
                                    'type'=> 'Robot',
                            
                                ]);
                                if(User::where('referral', $referral3)->exists() && auth()->user()->referral != 'NONE'){  

                                    $datauser4 = User::where('referral',  $referral3)
                                                ->get()->first();
                                                
                                    $referral4 = $datauser4['referral'];
                                    $referee4 = $datauser4['username'];
                                    $referral4Amt = $request->amount *2/100;
                                    $datareferral = User::where('referral',  $referral4)
                                    ->get()->first();
                                    $referralname = $datareferral['username'];

                                    bonus::create([
                                        'referral_id' => $referral4,
                                        'referralname'=> $referralname,
                                        'referee' =>  $referee4,
                                        'amount' => $referral4Amt,
                                        'type'=> 'Robot',
                                
                                    ]);
                                        
                                            if(User::where('referral', $referral4)->exists() && auth()->user()->referral != 'NONE'){  

                                                $datauser5 = User::where('referral',  $referral4)
                                                            ->get()->first();
                                                            
                                                $referral5 = $datauser5['referral'];
                                                $referee5 = $datauser5['username'];
                                                $referral5Amt = $request->amount *2/100;
                                                $datareferral = User::where('referral',  $referral5)
                                                ->get()->first();
                                                $referralname = $datareferral['username'];
            
                                                bonus::create([
                                                    'referral_id' => $referral4,
                                                    'referralname'=> $referralname,
                                                    'referee' =>  $referee5,
                                                    'amount' => $referral5Amt,
                                                    'type'=> 'Robot',
                                            
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
                    }else{
                        
                        return back()->with('toast_error', "This Request Can't Be Made !! Kindly Exhaust Your Monthly Plan");
                    }
                    

                }else{
                    $dr = DB::table('robots')->where('robotID', $request->id)->first();
                    
                    if($dr->daycounter == 0 ){
                        
                        ModelsRobot::create([
                            'robotID' => $dr->robotID,
                            'userID' => auth()->user()->userID,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'referral' => auth()->user()->referral,
                            'plan' => 'Renew',
                            'phone' => auth()->user()->phone,
                            'status' => 'PROCESSING',
                            'amount' => 50,
                            'daycounter' => 30,
                            'broker' => $dr->broker,
                            'tradingID' => $dr->tradingID,
                            'tradingpassword' => $dr->tradingpassword,
                        ]);
                       DB::table('robots')->where('robotID', $request->id)->update([
                        'daycounter' => 0,   
                       ]);
                            
                        return back()->with('toast_success', 'You Have Renewed Your Robot Offer!!');
    
                    }else{
                        
                        return back()->with('toast_error', "This Request Can't Be Made !! Kindly Exhaust Your Monthly Plan");
                    }
                }
                    
            }else{
                return redirect()->route('fund')->with('toast_error', 'Kindly Fund Your Wallet !!');

            }
        }
    }
}
