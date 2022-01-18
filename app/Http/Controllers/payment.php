<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class payment extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $id = $request->id;
        $data = DB::table('transactions')
                ->where('transaction_id', $id) 
                ->get();
        $databtc = DB::table('coins')->where('coinName', 'BTC')->get();
        $dataeth = DB::table('coins')->where('coinName', 'ETH')->get();
        $databnb = DB::table('coins')->where('coinName', 'BNB')->get();
        $databch = DB::table('coins')->where('coinName', 'BCH')->get();
        $datausdt = DB::table('coins')->where('coinName', 'USDT')->get();

        if(isset($id)){
            return view('user.paymentpage')->with('data', $data)->with('databtc', $databtc)->with('dataeth', $dataeth)->with('databnb', $databnb)->with('databch', $databch)->with('datausdt', $datausdt);
        }
        else{
            return redirect()->route('deposit');
        }

    }
}
