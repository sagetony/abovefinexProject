<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class referral extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $bonus = DB::table('bonuses')->where('referralID', auth()->user()->refereeID)
                ->get();
        $users = DB::table('users')->where('referral', auth()->user()->refereeID)->get();
        return view('user.referral')->with('bonus', $bonus)->with('users', $users);

    }
}
