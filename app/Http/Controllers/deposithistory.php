<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class deposithistory extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = DB::table('deposits')->where('userID', auth()->user()->userID)->get();
        return view('user.deposithistory')->with('data', $data);

    }
}
