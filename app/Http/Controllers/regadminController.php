<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Mail\EmailVerification;
use App\Models\admin as ModelsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class regadminController extends Controller
{
    
    public function index(){
        return view('admin.register');
    }

    public function rand(){
        return substr(rand(0, 10000000).time(), 0, 15);
    }
    public function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => ['required', 'max:30', 'min:10', 'confirmed'],
        ]);
        if ($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }else{
            $admin = ModelsAdmin::create([
                    'admin_id'=> $this->rand(),
                    'email'=> $request->email,
                    'password'=> Hash::make($request->password),
                    'role' => 'Superadmin',
                    'username'=> '',
                   

                ]);
                // // email......
                //         $details = [
                //             'name' => 'Superadmin',
                //         ];
                //         Mail::to($request->email)->send(new EmailVerification($details));
                //         // return 'email sent';
                    }
                return back()->withToastSuccess('Please check your email and activate your account');

        }
    }

