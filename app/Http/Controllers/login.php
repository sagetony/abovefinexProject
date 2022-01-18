<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class login extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        if(isset($id)){
           
            DB::table('users')
            ->where('userID', $id)
            ->update(['email_verified' => 'YES']);
            return view('user.login');
        }else{
            return view("user.login");

        }
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'username'=>'required',
            'password'=>' required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        
        $loginauth = $request->only('username', 'password');
       
        if(Auth::attempt($loginauth)){
            if(auth()->user()->email_verified == 'YES'){
                if(auth()->user()->status == 'ACTIVE'){
                    return redirect()->route('dashboard');
    
                }else{
                    return back()->with('toast_error', 'Account Blocked!!! Contact the Admin.');
                }
            }else{
                return back()->with('toast_error', 'Email Has Not Been Activated!!! Check Your Email');   
            }
            
        }else{
            return back()->with('toast_error', 'Invalid login details');
        }
    }
}
