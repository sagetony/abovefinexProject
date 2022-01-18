<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminuserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
                $datausers = DB::table('users')
                ->get();
                if(isset($request->lockid)){
                    DB::table('users')
                    ->where('userID', $request->lockid)
                    ->update(['status' => 'BLOCK']);
                    return back();
                
                }elseif(isset($request->unlockid)){
                        DB::table('users')
                            ->where('userID', $request->unlockid)
                            ->update(['status' => 'ACTIVE']);
                            return back();
        
                    }elseif(isset($request->deleteid)){
                        DB::table('users')
                        ->where('userID', $request->deleteid)
                        ->delete();
                        return back();
        
                    }else{
                    return view('admin.users')->with('datausers', $datausers);  

                }

        
    }
    public function store(Request $request){
        

            // if(isset($request->unlockid)){
            //         // DB::table('users')
            //         //     ->where('userID', $request->unlockid)
            //         //     ->update(['status'  => 'ACTIVE']);
            //         return dd('sas');
            // }elseif(isset($request->lockid)){
            //     // DB::table('users')
            //     //     ->where('userID', $request->lockid)
            //     //     ->update(['status' => 'BLOCK']);
            //     return dd('sas');

            // }elseif(isset($request->deleteid)){
            //     // DB::table('users')
            //     // ->where('userID', $request->deleteid)
            //     // ->delete();
            //     return dd('sas');

            // }
    }
}
