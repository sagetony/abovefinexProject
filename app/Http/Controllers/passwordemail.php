<?php

namespace App\Http\Controllers;

use App\Mail\passwordRecovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class passwordemail extends Controller
{
    public function index(){

        return view('user.passwordemail');
    }
    public function email(Request $request){
        $email = $request->email;
        $data = DB::table('users')->where('email', $email)->get();


        $details = [
            'name' => 'Reset your password by clicking on the button below',
            'data' => $data[0]->userID,
        ];

        Mail::to($email)->send(new passwordRecovery($details));
        return back()->withToastSuccess('Please check your email and reset your password');

    }
}
