<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class resetpassword extends Controller
{
    public function index(){
        
        return view('user.passwordreset');
    }
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'confirmed'],
            'password_confirmation' => 'required',
        ]);
      if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
      }

        $password = $request->password;
        DB::table('users')
        ->where('userID', $request->id)
        ->update(['password'=> $password]);

        return redirect()->route('login')->withToastSuccess('Successful');

    }
}
