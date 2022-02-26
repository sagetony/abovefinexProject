<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class tradingactivation extends Controller
{
    public function index(Request $request){
        if(isset($request->id)){
           $id = $request->id;
            return view('user.robotactivation')->with('id', $id);

        }else{
            return redirect()->route('robot');
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'broker'=>'required',
            'tradingID'=>'required',
            'password'=>'required',
            ]);

        if($validator->fails()){
    return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

    }

    DB::table('robots')->where('robotID', $request->id)->update([
        'broker'=>$request->broker,
            'tradingID'=>$request->tradingID,
            'tradingpassword'=>$request->password,
    ]);
    return redirect()->route('login')->with('toast_success', 'Successful!! Your Account Will Be Activated In Less Than 15mins');
    }
}
