<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class adminprofileController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $coin =DB::table('coins')->where('coinName', 'BTC')->get();
        $coinb =DB::table('coins')->where('coinName', 'BNB')->get();
        $coine =DB::table('coins')->where('coinName', 'ETH')->get();
        $coinu =DB::table('coins')->where('coinName', 'USDT')->get();
        $coinbc =DB::table('coins')->where('coinName', 'BCH')->get();


        return view('admin.profile')->with('coin', $coin)->with('coinb', $coinb)->with('coine', $coine)->with('coinbc', $coinbc)->with('coinu', $coinu);
    }

    public function updatewallet(Request $request){

        $validator = Validator::make($request->all(), [
            'wallet' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            DB::table('coins')->where('coinName', 'BTC')
                ->update(['coinAddress'=> $request->wallet]);
                
                return back()->with('toast_success', 'Wallet has been updated');

        }
    }

    public function ethwallet(Request $request){

        $validator = Validator::make($request->all(), [
            'wallet' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            DB::table('coins')->where('coinName', 'ETH')
                ->update(['coinAddress'=> $request->wallet]);
                
                return back()->with('toast_success', 'Wallet has been updated');

        }
    }
    public function bnbwallet(Request $request){

        $validator = Validator::make($request->all(), [
            'wallet' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            DB::table('coins')->where('coinName', 'BNB')
                ->update(['coinAddress'=> $request->wallet]);
                
                return back()->with('toast_success', 'Wallet has been updated');

        }
    }
    public function ltcwallet(Request $request){

        $validator = Validator::make($request->all(), [
            'wallet' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
                    DB::table('coins')->where('coinName', 'BCH')
                        ->update(['coinAddress'=> $request->wallet]);
                
                return back()->with('toast_success', 'Wallet has been updated');

        }
    }
    public function xrpwallet(Request $request){

        $validator = Validator::make($request->all(), [
            'wallet' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            DB::table('coins')->where('coinName', 'USDT')
                ->update(['coinAddress'=> $request->wallet]);
                
                return back()->with('toast_success', 'Wallet has been updated');

        }
    }
    public function updateadminpassword(Request $request){
        $validator = Validator::make($request->all(), [
            'currentPassword' => ['required'],
            'password' => ['required', 'confirmed'],
            // 'new_confirm_password' => ['same:new_password'],
        ]);
      if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

        // return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

      }
    $currentPassword = Auth::guard('admin')->user()->password; 
    $password = Hash::make($request->password);

    $data = DB::table('admins')->where('id', Auth::guard('admin')->user()->id)
                    ->update(['password' => $password]);

    
        Auth::logoutOtherDevices($password);

        return redirect()->route('adminlogin')->with('toast_success', 'Password has been updated');
    

    }
}
