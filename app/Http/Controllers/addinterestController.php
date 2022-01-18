<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class addinterestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
        $datadeposits = DB::table('deposits')
            ->where('transaction_id', $request->id)
            ->first();
        
        if(isset($request->id)){
            return view('admin.interest', ['datadeposits' => $datadeposits]);
        }else{
            return redirect()->route('adminfunding', ['datadeposits' => $datadeposits]);
        }
        
    }

    public function store(Request $request){

            $datadeposits = DB::table('deposits')
            ->where('transaction_id', $request->id)
            ->get();

                $validator = Validator::make($request->all(), [
                        'amount' => 'required',
                        
                ]);
                    if($validator->fails()){
                        return back()->with('toast_error', 'Failed transaction');
                    }else{
                        DB::table('deposits')
                        ->where('transaction_id', $request->id)
                        ->update(['planAmount' => $request->amount, 'interest' => $request->interest]);
                        return back()->with('toast_success', 'Interest Updated!!');
                        // return dd($request->id);

                    }
                

            
    }
}
