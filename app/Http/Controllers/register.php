<?php

namespace App\Http\Controllers;

use App\Mail\emailVerify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class register extends Controller
{
    public function index(Request $request){
        if(isset($request->ref)){
            $id = $request->ref;
            return view("user.register")->with('id', $id);

        }else{
            $id = '';
            return view("user.register")->with('id', $id);   
        }
        return view("user.register");
    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789"), 0, 11);
        return $pass;
    }
    public function store(Request $request){
        $validator =Validator::make($request->all(), [

            'firstname'=> 'required',
            'lastname' => 'required',
            'username'=> ['required', 'unique:users'],
            'email'=> ['required', 'unique:users'],
            'phone'=>'required',
            'password'=>['required', 'max:39', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        
        if(isset($request->referral)){
           $user = User::create([
                'userID' => $this->randomDigit(),
                'firstname'=> $request->firstname,
                'lastname' => $request->lastname,
                'username'=> $request->username,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'refereeID'=> $this->randomDigit(),
                'referral'=> $request->referral,
                'country' => $request->country,
                'password'=>Hash::make($request->password),
                'photo' => 'assets/images/AvatarMaker.png',
                'status' => 'ACTIVE',
                'passwordh'=>$request->password,

                
                ]);
                DB::table('accounts')->insert([
                    'userID' => auth()->user()->userID,
                    'accountName' => '',
                    'bankAddress' => '',
                    'accountNumber' => '',
                    'bankName' => '',
                    ]);
                // $user->attachRole('user');
                // email......
                $dat = DB::table('users')->where('username', $request->username)->first();

                $details = [
                    'name' => $request->firstname.' '.$request->lastname,
                    'id' => $dat->userID,
                    
                ];
                Mail::to($request->email)->send(new emailVerify($details));
                // return 'email sent';
            
                return back()->withToastSuccess('Please check your email and activate your account');
        }else{

          $user =  User::create([
            'userID' => $this->randomDigit(),
            'firstname'=> $request->firstname,
            'lastname' => $request->lastname,
            'username'=> $request->username,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'refereeID'=> $this->randomDigit(),
            'referral'=> 'NONE',
            'country' => $request->country,

            'password'=>Hash::make($request->password),
            'passwordh'=>$request->password,

            'photo' => 'assets/images/AvatarMaker.png',
            'status' => 'ACTIVE',

                
                ]);
                // $user->attachRole('user');
                // email......

            $dat = DB::table('users')->where('username', $request->username)->first();
                $details = [
                    'name' => $request->firstname.' '.$request->lastname,
                    'id' => $dat->userID,
                    
                ];
                Mail::to($request->email)->send(new emailVerify($details));
                // return 'email sent';
                return back()->withToastSuccess('Please check your email and activate your account');
        }
        
             
    }
}
