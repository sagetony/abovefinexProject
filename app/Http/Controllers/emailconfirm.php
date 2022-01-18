<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class emailconfirm extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        if(isset($id)){
           
            return dd($id);
            DB::table('users')
            ->where('userID', $id)
            ->update(['email_verified' => 'YES']);
            return view('user.login');
        }  
        // }else{
        //     return view('email.emailconfirm');
        // }
    }
}
