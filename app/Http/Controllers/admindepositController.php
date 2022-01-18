<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class admindepositController extends Controller

{
    public function __construct()
            {
                $this->middleware(['admin']);
            }

    public function index(){
        $datapas =  DB::table('packages')->get();
             
        $dataps =  DB::table('plans')->get();
 
        $datacs =  DB::table('coins')->get();
        
        return view ('admin.deposit')->with('datapas', $datapas)->with('dataps', $dataps)->with('datacs', $datacs);
    }

    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcnost"), 0, 12);
        return $pass;
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'package'=>'required',
            'amount'=>'required',
            'plan'=>'required',
            'coin'=>'required',

            'username' => 'required',
            ]);
       if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

       }
       $datauser = DB::table('users')->where('username', $request->username)->first();

       if($datauser == null){
        return back()->with('toast_error', 'Invalid Username');                                
       }else{
           
        Deposit::create([
            'transaction_id'=> $this->randomDigit(),
            'userID'=> $datauser->userID,
            'username' =>$datauser->username,
            'amount'=>$request->amount,
            'packages'=>$request->package,
            'planAmount' => $request->planAmount,
            'interest'=> 0,
            'status'=>'CONFIRM',
            'dayCounter'=> 0,
            'coin' =>$request->coin,
            'plan' => $request->plan,
            'interestcap' => 0,
        ]);    

        
        return back()->with('toast_success', 'Deposit Successful');                                
              
       } 
    }
}
