<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class withdrawhistory extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = DB::table('withdraws')->where('user_id', auth()->user()->userID)->get();
        return view('user.withdrawhistory')->with('data', $data);

    }
}
