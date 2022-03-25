<?php

namespace App\Http\Controllers;

use App\Mail\signal;
use App\Models\bonus;
use App\Models\signalbuy as ModelsSignalbuy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class signalbuy extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $robots = DB::table('signalbuys')->where('userID', auth()->user()->userID)->get()->first();
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
        return view('user.signalbuy')->with('datadeposit', $datadeposit)->with('datawit', $datawit)->with('datawiti', $datawiti)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datadepositi', $datadepositi)->with('data', $data)->with('datawitw', $datawitw)->with('datawitc',  $datawitc)->with('datasignal', $datasignal)->with('datarobot', $datarobot)->with('robots', $robots);
    }
    public function randomDigit()
    {
        $pass = substr(str_shuffle("0123456789abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }
    public function store(Request $request)
    {

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
        $amount  = 20;
        $amount50 = 50;
        $validator = Validator::make($request->all(), [
            // 'signalplan'=>'required',
            // 'amount'=>'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        if (ModelsSignalbuy::where('userID', auth()->user()->userID)->exists()) {
            if ($request->plan == 'Monthly') {
                if ($data >= $amount) {
                    $signaldata = DB::table('signalbuys')->where('userID', auth()->user()->userID)->get()->first();
                    $day = $signaldata->dayCounter + 30;
                    $newAmount = $signaldata->amount + $amount;
                    ModelsSignalbuy::where('userID', auth()->user()->userID)->update([

                        'status' => 'CONFIRM',
                        'dayCounter' => $day,
                        'amount' => $newAmount,
                    ]);
                    $details = [
                        'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,

                    ];

                    Mail::to(auth()->user()->email)->send(new signal($details));

                    if (User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'ADMIN') {

                        $datauser1 = User::where('userID', auth()->user()->userID)
                            ->get()->first();

                        $referral1 = $datauser1['referral'];
                        $referee = $datauser1['username'];
                        $referral1Amt = $amount * 20 / 100;

                        $datareferral1 = User::where('refereeID',  $referral1)
                            ->get()->first();
                        $referralname1 = $datareferral1['username'];

                        bonus::create([
                            'referralID' => $referral1,
                            'referralname' => $referralname1,
                            'referee' =>  $referee,
                            'amount' => $referral1Amt,
                            'type' => 'Signal',
                        ]);



                        $datarefs = User::where('refereeID', $referral1)->get()->first();

                        if (User::where('referral', $datarefs['referral'])->exists() && $datarefs['referral'] != 'ADMIN') {
                            $datauser2 = User::where('referral',  $datarefs['referral'])
                                ->get()->first();
                            $referral2 = $datauser2['referral'];

                            $referee2 = $datauser2['username'];
                            $referral2Amt = $amount * 10 / 100;

                            $datareferral2 = User::where('refereeID',  $referral2)
                                ->get()->first();

                            $referralname2 = $datareferral2['username'];
                            bonus::create([
                                'referralID' => $referral2,
                                'referralname' => $referralname2,
                                'referee' =>  $referee,
                                'amount' => $referral2Amt,
                                'type' => 'Signal',
                            ]);


                            $datarefs2 = User::where('refereeID', $referral2)->get()->first();

                            if (User::where('referral', $datarefs2['referral'])->exists() && $datarefs2['referral'] != 'ADMIN') {


                                $datauser3 = User::where('referral',  $datarefs2['referral'])
                                    ->get()->first();

                                $referral3 = $datauser3['referral'];
                                $referee3 = $datauser3['username'];
                                $referral3Amt = $amount * 10 / 100;
                                $datareferral = User::where('refereeID',  $referral3)
                                    ->get()->first();
                                $referralname = $datareferral['username'];

                                bonus::create([
                                    'referralID' => $referral3,
                                    'referralname' => $referralname,
                                    'referee' =>  $referee,
                                    'amount' => $referral3Amt,
                                    'type' => 'Signal',

                                ]);
                                $dataref3 = User::where('refereeID', $referral3)->get()->first();

                                if (User::where('referral', $dataref3['referral'])->exists() && $dataref3['referral'] != 'ADMIN') {

                                    $datauser4 = User::where('referral',   $dataref3['referral'])
                                        ->get()->first();

                                    $referral4 = $datauser4['referral'];
                                    $referee4 = $datauser4['username'];
                                    $referral4Amt = $amount * 5 / 100;
                                    $datareferral = User::where('refereeID', $referral4)
                                        ->get()->first();
                                    $referralname = $datareferral['username'];

                                    bonus::create([
                                        'referralID' => $referral4,
                                        'referralname' => $referralname,
                                        'referee' =>  $referee,
                                        'amount' => $referral4Amt,
                                        'type' => 'Signal',

                                    ]);
                                    $dataref4 = User::where('refereeID', $referral4)->get()->first();

                                    if (User::where('referral', $dataref4['referral'])->exists() && $dataref4['referral'] != 'ADMIN') {

                                        $datauser5 = User::where('referral',  $dataref4['referral'])
                                            ->get()->first();

                                        $referral5 = $datauser5['referral'];
                                        $referee5 = $datauser5['username'];
                                        $referral5Amt = $amount * 5 / 100;
                                        $datareferral = User::where('refereeID',  $referral5)
                                            ->get()->first();
                                        $referralname = $datareferral['username'];

                                        bonus::create([
                                            'referralID' => $referral5,
                                            'referralname' => $referralname,
                                            'referee' =>  $referee,
                                            'amount' => $referral5Amt,
                                            'type' => 'Signal',

                                        ]);
                                        $datauserA = User::where('userID', auth()->user()->userID)
                                            ->get()->first();

                                        $referralA = $datauserA['referral'];
                                        $refereeA = $datauserA['username'];
                                        $referralAAmt = $amount * 50 / 100;

                                        bonus::create([
                                            'referralID' => 'ADMIN',
                                            'referralname' => 'ADMIN',
                                            'referee' =>  $referee,
                                            'amount' => $referralAAmt,
                                            'type' => 'Signal',
                                        ]);
                                        return back()->with('toast_success', 'You Have Renewed For One Month VIP Signal !!');
                                    } else {
                                        $datauser5 = User::where('referral',  $referral4)
                                            ->get()->first();

                                        $referral5 = $datauser3['referral'];
                                        $referee5 = $datauser3['username'];
                                        $referral5Amt = $amount * 55 / 100;

                                        bonus::create([
                                            'referralID' => 'ADMIN',
                                            'referralname' => 'ADMIN',
                                            'referee' =>  $referee,
                                            'amount' => $referral5Amt,
                                            'type' => 'Signal',
                                        ]);



                                        return back()->with('toast_success', 'You Have Renewed For One Month VIP Signal !!');
                                    }
                                } else {
                                    $datauser4 = User::where('referral',  $referral3)
                                        ->get()->first();

                                    $referral4 = $datauser4['referral'];
                                    $referee4 = $datauser4['username'];
                                    $referral4Amt = $amount * 60 / 100;



                                    bonus::create([
                                        'referralID' => 'ADMIN',
                                        'referralname' => 'ADMIN',
                                        'referee' =>  $referee,
                                        'amount' => $referral4Amt,
                                        'type' => 'Signal',
                                    ]);

                                    return back()->with('toast_success', 'You Have Renewed For One Month VIP Signal !!');
                                }
                            } else {
                                $datauser3 = User::where('referral',  $referral2)
                                    ->get()->first();

                                $referral3 = $datauser3['referral'];
                                $referee3 = $datauser3['username'];
                                $referral3Amt = $amount * 70 / 100;



                                bonus::create([
                                    'referralID' => 'ADMIN',
                                    'referralname' => 'ADMIN',
                                    'referee' =>  $referee,
                                    'amount' => $referral3Amt,
                                    'type' => 'Signal',
                                ]);
                                return back()->with('toast_success', 'You Have Renewed For One Month VIP Signal !!');
                            }
                        } else {

                            $datauser2 = User::where('referral',  $referral1)
                                ->get()->first();
                            $referral2 = $datauser2['referral'];
                            $referee2 = $datauser2['username'];
                            $referral2Amt = $amount * 80 / 100;

                            bonus::create([
                                'referralID' => 'ADMIN',
                                'referralname' => 'ADMIN',
                                'referee' =>  $referee2,
                                'amount' => $referral2Amt,
                                'type' => 'Signal',
                            ]);

                            return back()->with('toast_success', 'You Have Renewed For One Month VIP Signal !!');
                        }
                    } else {
                        return redirect()->route('fund')->with('toast_error', 'Kindly Fund Your Wallet !!');
                    }
                } else{
                    
                        return redirect()->route('fund')->with('toast_error', 'Kindly Fund Your Wallet !!');
                    
                }
            }else {
                if ($data >= $amount50) {
                    $signaldata = DB::table('signalbuys')->where('userID', auth()->user()->userID)->get()->first();
                    $day = $signaldata->dayCounter + 90;
                    $newAmount = $signaldata->amount + $amount50;
                    ModelsSignalbuy::where('userID', auth()->user()->userID)->update([

                        'status' => 'CONFIRM',
                        'dayCounter' => $day,
                        'amount' => $newAmount,
                    ]);
                    $details = [
                        'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,

                    ];

                    Mail::to(auth()->user()->email)->send(new signal($details));

                    if (User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'ADMIN') {

                        $datauser1 = User::where('userID', auth()->user()->userID)
                            ->get()->first();

                        $referral1 = $datauser1['referral'];
                        $referee = $datauser1['username'];
                        $referral1Amt = $amount50 * 20 / 100;

                        $datareferral1 = User::where('refereeID',  $referral1)
                            ->get()->first();
                        $referralname1 = $datareferral1['username'];

                        bonus::create([
                            'referralID' => $referral1,
                            'referralname' => $referralname1,
                            'referee' =>  $referee,
                            'amount' => $referral1Amt,
                            'type' => 'Signal',
                        ]);



                        $datarefs = User::where('refereeID', $referral1)->get()->first();

                        if (User::where('referral', $datarefs['referral'])->exists() && $datarefs['referral'] != 'ADMIN') {
                            $datauser2 = User::where('referral',  $datarefs['referral'])
                                ->get()->first();
                            $referral2 = $datauser2['referral'];

                            $referee2 = $datauser2['username'];
                            $referral2Amt = $amount50 * 10 / 100;

                            $datareferral2 = User::where('refereeID',  $referral2)
                                ->get()->first();

                            $referralname2 = $datareferral2['username'];
                            bonus::create([
                                'referralID' => $referral2,
                                'referralname' => $referralname2,
                                'referee' =>  $referee,
                                'amount' => $referral2Amt,
                                'type' => 'Signal',
                            ]);


                            $datarefs2 = User::where('refereeID', $referral2)->get()->first();

                            if (User::where('referral', $datarefs2['referral'])->exists() && $datarefs2['referral'] != 'ADMIN') {


                                $datauser3 = User::where('referral',  $datarefs2['referral'])
                                    ->get()->first();

                                $referral3 = $datauser3['referral'];
                                $referee3 = $datauser3['username'];
                                $referral3Amt = $amount50 * 10 / 100;
                                $datareferral = User::where('refereeID',  $referral3)
                                    ->get()->first();
                                $referralname = $datareferral['username'];

                                bonus::create([
                                    'referralID' => $referral3,
                                    'referralname' => $referralname,
                                    'referee' =>  $referee,
                                    'amount' => $referral3Amt,
                                    'type' => 'Signal',

                                ]);
                                $dataref3 = User::where('refereeID', $referral3)->get()->first();

                                if (User::where('referral', $dataref3['referral'])->exists() && $dataref3['referral'] != 'ADMIN') {

                                    $datauser4 = User::where('referral',   $dataref3['referral'])
                                        ->get()->first();

                                    $referral4 = $datauser4['referral'];
                                    $referee4 = $datauser4['username'];
                                    $referral4Amt = $amount50 * 5 / 100;
                                    $datareferral = User::where('refereeID', $referral4)
                                        ->get()->first();
                                    $referralname = $datareferral['username'];

                                    bonus::create([
                                        'referralID' => $referral4,
                                        'referralname' => $referralname,
                                        'referee' =>  $referee,
                                        'amount' => $referral4Amt,
                                        'type' => 'Signal',

                                    ]);
                                    $dataref4 = User::where('refereeID', $referral4)->get()->first();

                                    if (User::where('referral', $dataref4['referral'])->exists() && $dataref4['referral'] != 'ADMIN') {

                                        $datauser5 = User::where('referral',  $dataref4['referral'])
                                            ->get()->first();

                                        $referral5 = $datauser5['referral'];
                                        $referee5 = $datauser5['username'];
                                        $referral5Amt = $amount50 * 5 / 100;
                                        $datareferral = User::where('refereeID',  $referral5)
                                            ->get()->first();
                                        $referralname = $datareferral['username'];

                                        bonus::create([
                                            'referralID' => $referral5,
                                            'referralname' => $referralname,
                                            'referee' =>  $referee,
                                            'amount' => $referral5Amt,
                                            'type' => 'Signal',

                                        ]);
                                        $datauserA = User::where('userID', auth()->user()->userID)
                                            ->get()->first();

                                        $referralA = $datauserA['referral'];
                                        $refereeA = $datauserA['username'];
                                        $referralAAmt = $amount50 * 50 / 100;

                                        bonus::create([
                                            'referralID' => 'ADMIN',
                                            'referralname' => 'ADMIN',
                                            'referee' =>  $referee,
                                            'amount' => $referralAAmt,
                                            'type' => 'Signal',
                                        ]);
                                        return back()->with('toast_success', 'You Have Renewed For Three Month VIP Signal !!');
                                    } else {
                                        $datauser5 = User::where('referral',  $referral4)
                                            ->get()->first();

                                        $referral5 = $datauser3['referral'];
                                        $referee5 = $datauser3['username'];
                                        $referral5Amt = $amount50 * 55 / 100;

                                        bonus::create([
                                            'referralID' => 'ADMIN',
                                            'referralname' => 'ADMIN',
                                            'referee' =>  $referee,
                                            'amount' => $referral5Amt,
                                            'type' => 'Signal',
                                        ]);



                                        return back()->with('toast_success', 'You Have Renewed For Three Month VIP Signal !!');
                                    }
                                } else {
                                    $datauser4 = User::where('referral',  $referral3)
                                        ->get()->first();

                                    $referral4 = $datauser4['referral'];
                                    $referee4 = $datauser4['username'];
                                    $referral4Amt = $amount50 * 60 / 100;



                                    bonus::create([
                                        'referralID' => 'ADMIN',
                                        'referralname' => 'ADMIN',
                                        'referee' =>  $referee,
                                        'amount' => $referral4Amt,
                                        'type' => 'Signal',
                                    ]);

                                    return back()->with('toast_success', 'You Have Renewed For Three Month VIP Signal !!');
                                }
                            } else {
                                $datauser3 = User::where('referral',  $referral2)
                                    ->get()->first();

                                $referral3 = $datauser3['referral'];
                                $referee3 = $datauser3['username'];
                                $referral3Amt = $amount50 * 70 / 100;



                                bonus::create([
                                    'referralID' => 'ADMIN',
                                    'referralname' => 'ADMIN',
                                    'referee' =>  $referee,
                                    'amount' => $referral3Amt,
                                    'type' => 'Signal',
                                ]);
                                return back()->with('toast_success', 'You Have Renewed For Three Month VIP Signal !!');
                            }
                        } else {

                            $datauser2 = User::where('referral',  $referral1)
                                ->get()->first();
                            $referral2 = $datauser2['referral'];
                            $referee2 = $datauser2['username'];
                            $referral2Amt = $amount50 * 80 / 100;

                            bonus::create([
                                'referralID' => 'ADMIN',
                                'referralname' => 'ADMIN',
                                'referee' =>  $referee2,
                                'amount' => $referral2Amt,
                                'type' => 'Signal',
                            ]);

                            return back()->with('toast_success', 'You Have Renewed For Three Month VIP Signal !!');
                        }
                    } else {

                        $datauser1 = User::where('userID', auth()->user()->userID)
                            ->get()->first();

                        $referral1 = $datauser1['referral'];
                        $referee = $datauser1['username'];
                        $referral1Amt = $amount50 * 100 / 100;

                        bonus::create([
                            'referralID' => 'ADMIN',
                            'referralname' => 'ADMIN',
                            'referee' =>  $referee,
                            'amount' => $referral1Amt,
                            'type' => 'Signal',
                        ]);



                        return back()->with('toast_success', 'You Have Renewed For Three Month VIP Signal !!');
                    }
                } else {
                    return redirect()->route('fund')->with('toast_error', 'Kindly Fund Your Wallet !!');
                }
            }
        } else {
            if ($request->plan == 'Monthly') {
                if ($data >= $amount) {
                    if (User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'ADMIN') {
                        ModelsSignalbuy::create([
                            'signalpurchaseID' => $this->randomDigit(),
                            'userID' => auth()->user()->userID,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'referral' => auth()->user()->referral,
                            'signalplan' => $request->plan,
                            'phone' => auth()->user()->phone,
                            'status' => 'CONFIRM',
                            'amount' => $amount,
                            'dayCounter' => 30,
                        ]);
                        // email....

                        $details = [
                            'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,

                        ];

                        Mail::to(auth()->user()->email)->send(new signal($details));

                        $datauser1 = User::where('userID', auth()->user()->userID)
                            ->get()->first();

                        $referral1 = $datauser1['referral'];
                        $referee = $datauser1['username'];
                        $referral1Amt = $amount * 20 / 100;

                        $datareferral1 = User::where('refereeID',  $referral1)
                            ->get()->first();
                        $referralname1 = $datareferral1['username'];

                        bonus::create([
                            'referralID' => $referral1,
                            'referralname' => $referralname1,
                            'referee' =>  $referee,
                            'amount' => $referral1Amt,
                            'type' => 'Signal',
                        ]);



                        $datarefs = User::where('refereeID', $referral1)->get()->first();

                        if (User::where('referral', $datarefs['referral'])->exists() && $datarefs['referral'] != 'ADMIN') {
                            $datauser2 = User::where('referral',  $datarefs['referral'])
                                ->get()->first();
                            $referral2 = $datauser2['referral'];

                            $referee2 = $datauser2['username'];
                            $referral2Amt = $amount * 10 / 100;

                            $datareferral2 = User::where('refereeID',  $referral2)
                                ->get()->first();

                            $referralname2 = $datareferral2['username'];
                            bonus::create([
                                'referralID' => $referral2,
                                'referralname' => $referralname2,
                                'referee' =>  $referee,
                                'amount' => $referral2Amt,
                                'type' => 'Signal',
                            ]);


                            $datarefs2 = User::where('refereeID', $referral2)->get()->first();

                            if (User::where('referral', $datarefs2['referral'])->exists() && $datarefs2['referral'] != 'ADMIN') {


                                $datauser3 = User::where('referral',  $datarefs2['referral'])
                                    ->get()->first();

                                $referral3 = $datauser3['referral'];
                                $referee3 = $datauser3['username'];
                                $referral3Amt = $amount * 10 / 100;
                                $datareferral = User::where('refereeID',  $referral3)
                                    ->get()->first();
                                $referralname = $datareferral['username'];

                                bonus::create([
                                    'referralID' => $referral3,
                                    'referralname' => $referralname,
                                    'referee' =>  $referee,
                                    'amount' => $referral3Amt,
                                    'type' => 'Signal',

                                ]);
                                $dataref3 = User::where('refereeID', $referral3)->get()->first();

                                if (User::where('referral', $dataref3['referral'])->exists() && $dataref3['referral'] != 'ADMIN') {

                                    $datauser4 = User::where('referral',   $dataref3['referral'])
                                        ->get()->first();

                                    $referral4 = $datauser4['referral'];
                                    $referee4 = $datauser4['username'];
                                    $referral4Amt = $amount * 5 / 100;
                                    $datareferral = User::where('refereeID', $referral4)
                                        ->get()->first();
                                    $referralname = $datareferral['username'];

                                    bonus::create([
                                        'referralID' => $referral4,
                                        'referralname' => $referralname,
                                        'referee' =>  $referee,
                                        'amount' => $referral4Amt,
                                        'type' => 'Signal',

                                    ]);
                                    $dataref4 = User::where('refereeID', $referral4)->get()->first();

                                    if (User::where('referral', $dataref4['referral'])->exists() && $dataref4['referral'] != 'ADMIN') {

                                        $datauser5 = User::where('referral',  $dataref4['referral'])
                                            ->get()->first();

                                        $referral5 = $datauser5['referral'];
                                        $referee5 = $datauser5['username'];
                                        $referral5Amt = $amount * 5 / 100;
                                        $datareferral = User::where('refereeID',  $referral5)
                                            ->get()->first();
                                        $referralname = $datareferral['username'];

                                        bonus::create([
                                            'referralID' => $referral5,
                                            'referralname' => $referralname,
                                            'referee' =>  $referee,
                                            'amount' => $referral5Amt,
                                            'type' => 'Signal',

                                        ]);
                                        $datauserA = User::where('userID', auth()->user()->userID)
                                            ->get()->first();

                                        $referralA = $datauserA['referral'];
                                        $refereeA = $datauserA['username'];
                                        $referralAAmt = $amount * 50 / 100;

                                        bonus::create([
                                            'referralID' => 'ADMIN',
                                            'referralname' => 'ADMIN',
                                            'referee' =>  $referee,
                                            'amount' => $referralAAmt,
                                            'type' => 'Signal',
                                        ]);
                                        return back()->with('toast_success', 'You Have Subscribed For One Month VIP Signal !!');
                                    } else {
                                        $datauser5 = User::where('referral',  $referral4)
                                            ->get()->first();

                                        $referral5 = $datauser3['referral'];
                                        $referee5 = $datauser3['username'];
                                        $referral5Amt = $amount * 55 / 100;

                                        bonus::create([
                                            'referralID' => 'ADMIN',
                                            'referralname' => 'ADMIN',
                                            'referee' =>  $referee,
                                            'amount' => $referral5Amt,
                                            'type' => 'Signal',
                                        ]);



                                        return back()->with('toast_success', 'You Have Subscribed For One Month VIP Signal !!');
                                    }
                                } else {
                                    $datauser4 = User::where('referral',  $referral3)
                                        ->get()->first();

                                    $referral4 = $datauser4['referral'];
                                    $referee4 = $datauser4['username'];
                                    $referral4Amt = $amount * 60 / 100;



                                    bonus::create([
                                        'referralID' => 'ADMIN',
                                        'referralname' => 'ADMIN',
                                        'referee' =>  $referee,
                                        'amount' => $referral4Amt,
                                        'type' => 'Signal',
                                    ]);

                                    return back()->with('toast_success', 'You Have Subscribed For One Month VIP Signal !!');
                                }
                            } else {
                                $datauser3 = User::where('referral',  $referral2)
                                    ->get()->first();

                                $referral3 = $datauser3['referral'];
                                $referee3 = $datauser3['username'];
                                $referral3Amt = $amount * 70 / 100;



                                bonus::create([
                                    'referralID' => 'ADMIN',
                                    'referralname' => 'ADMIN',
                                    'referee' =>  $referee,
                                    'amount' => $referral3Amt,
                                    'type' => 'Signal',
                                ]);
                                return back()->with('toast_success', 'You Have Subscribed For One Month VIP Signal !!');
                            }
                        } else {

                            $datauser2 = User::where('referral',  $referral1)
                                ->get()->first();
                            $referral2 = $datauser2['referral'];
                            $referee2 = $datauser2['username'];
                            $referral2Amt = $amount * 80 / 100;

                            bonus::create([
                                'referralID' => 'ADMIN',
                                'referralname' => 'ADMIN',
                                'referee' =>  $referee2,
                                'amount' => $referral2Amt,
                                'type' => 'Signal',
                            ]);

                            return back()->with('toast_success', 'You Have Subscribed For One Month VIP Signal !!');
                        }
                    } else {
                        ModelsSignalbuy::create([
                            'signalpurchaseID' => $this->randomDigit(),
                            'userID' => auth()->user()->userID,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'referral' => auth()->user()->referral,
                            'signalplan' =>  $request->plan,
                            'phone' => auth()->user()->phone,
                            'status' => 'CONFIRM',
                            'amount' => $amount,
                            'dayCounter' => 30,
                        ]);

                        $datauser1 = User::where('userID', auth()->user()->userID)
                            ->get()->first();

                        $referral1 = $datauser1['referral'];
                        $referee = $datauser1['username'];
                        $referral1Amt = $amount * 100 / 100;

                        bonus::create([
                            'referralID' => 'ADMIN',
                            'referralname' => 'ADMIN',
                            'referee' =>  $referee,
                            'amount' => $referral1Amt,
                            'type' => 'Signal',
                        ]);
                        // if (ModelsSignalbuy::where('userID', auth()->user()->userID)->exists()) {
                        //     $signaldata = DB::table('signalbuys')->where('userID', auth()->user()->userID)->get()->first();
                        //     $day = $signaldata->dayCounter + 30;
                        //     ModelsSignalbuy::where('userID', auth()->user()->userID)->update([
                        //         'status' => 'CONFIRM',
                        //         'dayCounter' => $day,
                        //     ]);
                        // }
                        // email....

                        $details = [
                            'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,

                        ];

                        Mail::to(auth()->user()->email)->send(new signal($details));

                        return back()->with('toast_success', 'You Have Subscribed For One Month VIP Signal !!');
                    }
                } else {
                    return redirect()->route('fund')->with('toast_error', 'Kindly Fund Your Wallet !!');
                }
            } else {
                if ($data >= $amount50) {
                    if (User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'ADMIN') {
                        ModelsSignalbuy::create([
                            'signalpurchaseID' => $this->randomDigit(),
                            'userID' => auth()->user()->userID,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'referral' => auth()->user()->referral,
                            'signalplan' => $request->plan,
                            'phone' => auth()->user()->phone,
                            'status' => 'CONFIRM',
                            'amount' => $amount50,
                            'dayCounter' => 90,
                        ]);
                        // email....

                        $details = [
                            'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,

                        ];

                        Mail::to(auth()->user()->email)->send(new signal($details));


                        if (User::where('referral', auth()->user()->referral)->exists() && auth()->user()->referral != 'ADMIN') {

                            $datauser1 = User::where('userID', auth()->user()->userID)
                                ->get()->first();

                            $referral1 = $datauser1['referral'];
                            $referee = $datauser1['username'];
                            $referral1Amt = $amount50 * 20 / 100;

                            $datareferral1 = User::where('refereeID',  $referral1)
                                ->get()->first();
                            $referralname1 = $datareferral1['username'];

                            bonus::create([
                                'referralID' => $referral1,
                                'referralname' => $referralname1,
                                'referee' =>  $referee,
                                'amount' => $referral1Amt,
                                'type' => 'Signal',
                            ]);



                            $datarefs = User::where('refereeID', $referral1)->get()->first();

                            if (User::where('referral', $datarefs['referral'])->exists() && $datarefs['referral'] != 'ADMIN') {
                                $datauser2 = User::where('referral',  $datarefs['referral'])
                                    ->get()->first();
                                $referral2 = $datauser2['referral'];

                                $referee2 = $datauser2['username'];
                                $referral2Amt = $amount50 * 10 / 100;

                                $datareferral2 = User::where('refereeID',  $referral2)
                                    ->get()->first();

                                $referralname2 = $datareferral2['username'];
                                bonus::create([
                                    'referralID' => $referral2,
                                    'referralname' => $referralname2,
                                    'referee' =>  $referee,
                                    'amount' => $referral2Amt,
                                    'type' => 'Signal',
                                ]);


                                $datarefs2 = User::where('refereeID', $referral2)->get()->first();

                                if (User::where('referral', $datarefs2['referral'])->exists() && $datarefs2['referral'] != 'ADMIN') {


                                    $datauser3 = User::where('referral',  $datarefs2['referral'])
                                        ->get()->first();

                                    $referral3 = $datauser3['referral'];
                                    $referee3 = $datauser3['username'];
                                    $referral3Amt = $amount50 * 10 / 100;
                                    $datareferral = User::where('refereeID',  $referral3)
                                        ->get()->first();
                                    $referralname = $datareferral['username'];

                                    bonus::create([
                                        'referralID' => $referral3,
                                        'referralname' => $referralname,
                                        'referee' =>  $referee,
                                        'amount' => $referral3Amt,
                                        'type' => 'Signal',

                                    ]);
                                    $dataref3 = User::where('refereeID', $referral3)->get()->first();

                                    if (User::where('referral', $dataref3['referral'])->exists() && $dataref3['referral'] != 'ADMIN') {

                                        $datauser4 = User::where('referral',   $dataref3['referral'])
                                            ->get()->first();

                                        $referral4 = $datauser4['referral'];
                                        $referee4 = $datauser4['username'];
                                        $referral4Amt = $amount50 * 5 / 100;
                                        $datareferral = User::where('refereeID', $referral4)
                                            ->get()->first();
                                        $referralname = $datareferral['username'];

                                        bonus::create([
                                            'referralID' => $referral4,
                                            'referralname' => $referralname,
                                            'referee' =>  $referee,
                                            'amount' => $referral4Amt,
                                            'type' => 'Signal',

                                        ]);
                                        $dataref4 = User::where('refereeID', $referral4)->get()->first();

                                        if (User::where('referral', $dataref4['referral'])->exists() && $dataref4['referral'] != 'ADMIN') {

                                            $datauser5 = User::where('referral',  $dataref4['referral'])
                                                ->get()->first();

                                            $referral5 = $datauser5['referral'];
                                            $referee5 = $datauser5['username'];
                                            $referral5Amt = $amount50 * 5 / 100;
                                            $datareferral = User::where('refereeID',  $referral5)
                                                ->get()->first();
                                            $referralname = $datareferral['username'];

                                            bonus::create([
                                                'referralID' => $referral5,
                                                'referralname' => $referralname,
                                                'referee' =>  $referee,
                                                'amount' => $referral5Amt,
                                                'type' => 'Signal',

                                            ]);
                                            $datauserA = User::where('userID', auth()->user()->userID)
                                                ->get()->first();

                                            $referralA = $datauserA['referral'];
                                            $refereeA = $datauserA['username'];
                                            $referralAAmt = $amount50 * 50 / 100;

                                            bonus::create([
                                                'referralID' => 'ADMIN',
                                                'referralname' => 'ADMIN',
                                                'referee' =>  $referee,
                                                'amount' => $referralAAmt,
                                                'type' => 'Signal',
                                            ]);
                                            return back()->with('toast_success', 'You Have Subscribed For Three Month VIP Signal !!');
                                        } else {
                                            $datauser5 = User::where('referral',  $referral4)
                                                ->get()->first();

                                            $referral5 = $datauser3['referral'];
                                            $referee5 = $datauser3['username'];
                                            $referral5Amt = $amount50 * 55 / 100;

                                            bonus::create([
                                                'referralID' => 'ADMIN',
                                                'referralname' => 'ADMIN',
                                                'referee' =>  $referee,
                                                'amount' => $referral5Amt,
                                                'type' => 'Signal',
                                            ]);



                                            return back()->with('toast_success', 'You Have Subscribed For Three Month VIP Signal !!');
                                        }
                                    } else {
                                        $datauser4 = User::where('referral',  $referral3)
                                            ->get()->first();

                                        $referral4 = $datauser4['referral'];
                                        $referee4 = $datauser4['username'];
                                        $referral4Amt = $amount50 * 60 / 100;



                                        bonus::create([
                                            'referralID' => 'ADMIN',
                                            'referralname' => 'ADMIN',
                                            'referee' =>  $referee,
                                            'amount' => $referral4Amt,
                                            'type' => 'Signal',
                                        ]);

                                        return back()->with('toast_success', 'You Have Subscribed For Three Month VIP Signal !!');
                                    }
                                } else {
                                    $datauser3 = User::where('referral',  $referral2)
                                        ->get()->first();

                                    $referral3 = $datauser3['referral'];
                                    $referee3 = $datauser3['username'];
                                    $referral3Amt = $amount50 * 70 / 100;



                                    bonus::create([
                                        'referralID' => 'ADMIN',
                                        'referralname' => 'ADMIN',
                                        'referee' =>  $referee,
                                        'amount' => $referral3Amt,
                                        'type' => 'Signal',
                                    ]);
                                    return back()->with('toast_success', 'You Have Subscribed For Three Month VIP Signal !!');
                                }
                            } else {

                                $datauser2 = User::where('referral',  $referral1)
                                    ->get()->first();
                                $referral2 = $datauser2['referral'];
                                $referee2 = $datauser2['username'];
                                $referral2Amt = $amount50 * 80 / 100;

                                bonus::create([
                                    'referralID' => 'ADMIN',
                                    'referralname' => 'ADMIN',
                                    'referee' =>  $referee2,
                                    'amount' => $referral2Amt,
                                    'type' => 'Signal',
                                ]);

                                return back()->with('toast_success', 'You Have Subscribed For Three Month VIP Signal !!');
                            }
                        } else {
                            ModelsSignalbuy::create([
                                'signalpurchaseID' => $this->randomDigit(),
                                'userID' => auth()->user()->userID,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'referral' => auth()->user()->referral,
                                'signalplan' =>  $request->plan,
                                'phone' => auth()->user()->phone,
                                'status' => 'CONFIRM',
                                'amount' => $amount50,
                                'dayCounter' => 90,
                            ]);

                            $datauser1 = User::where('userID', auth()->user()->userID)
                                ->get()->first();

                            $referral1 = $datauser1['referral'];
                            $referee = $datauser1['username'];
                            $referral1Amt = $amount50 * 100 / 100;

                            bonus::create([
                                'referralID' => 'ADMIN',
                                'referralname' => 'ADMIN',
                                'referee' =>  $referee,
                                'amount' => $referral1Amt,
                                'type' => 'Signal',
                            ]);



                            // $details = [
                            //     'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,

                            // ];

                            // Mail::to(auth()->user()->email)->send(new signal($details));

                            return back()->with('toast_success', 'You Have Subscribed For Three Month VIP Signal !!');
                        }
                    } else {
                        return redirect()->route('fund')->with('toast_error', 'Kindly Fund Your Wallet !!');
                    }
                }
            }
        }
    }
}
