<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{

    public function __construct()
            {
                $this->middleware(['admin']);
            }

    public function index(){
      
        $datadeposit = DB::table('deposits')                
                ->where('status', 'CONFIRM')
                ->sum('amount');
       
        $datainterest = DB::table('deposits')
                ->where('status', 'CONFIRM')
                ->get()
                ->sum('interest');

        $datareferral = DB::table('bonuses')
                ->sum('amount');

        $datawithdraw = DB::table('withdraws')
                ->sum('amount');
        $datapwithdraw = DB::table('withdraws')
                ->where('status', 'CONFIRM')
                ->sum('amount');
        $datatwithdraw = DB::table('withdraws')
                
                ->sum('amount');
        $datauser = DB::table('users')
                ->count('id');
        $dataamount = DB::table('deposits')
                ->count('id');
        $datawith =DB::table('withdraws')
                ->count('id');
        $datarwith =DB::table('withdraws')
                ->where('type_withdraw', 'Bonus')
                ->sum('amount');
        $dataiwith =DB::table('withdraws')
                ->where('type_withdraw', 'Interest')
                ->sum('amount');
        $datacwith =DB::table('withdraws')
                ->where('type_withdraw', 'Capital')
                ->sum('amount');
        $datacwith =DB::table('withdraws')
                ->where('type_withdraw', 'Capital')
                ->sum('amount');
            
    
        
        
            return view('admin.dashboard')->with('datadeposit', $datadeposit)->with('datainterest', $datainterest)->with('datareferral', $datareferral)->with('datawithdraw', $datawithdraw)->with('datauser', $datauser)->with('dataamount', $dataamount)->with('datatwithdraw', $datatwithdraw)->with('datawith', $datawith)->with('datacwith', $datacwith)->with('dataiwith', $dataiwith)->with('datarwith', $datarwith)->with('datapwithdraw', $datapwithdraw);
            
        
    }
}
