<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminsignalbuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
                $datadeposits = DB::table('signalbuys')->orderByDesc('id')
                ->paginate(15);

                if(isset($request->confirmid)){
                    DB::table('signalbuys')
                    ->where('signalpurchaseID', $request->confirmid)
                    ->update(['status' => 'CONFIRM']);
                    return back();
                    // email....
        
                    // $details = [
                    //     'name' => $datauser->firstname.' '.$datauser->lastname,
                    //     'amount' => $datadepo->amount,
                        
                    //     'id' => $datadepo->signalpurchaseID,
                    // ]; 
        
                    // Mail::to($datauser->email)->send(new EmailFunding($details));
        
                    return back();
                
                }elseif(isset($request->unconfirmid)){
                        DB::table('signalbuys')
                            ->where('signalpurchaseID', $request->unconfirmid)
                            ->update(['status' => 'PENDING']);
                            return back();
        
                    }elseif(isset($request->deleteid)){
                        DB::table('signalbuys')
                        ->where('signalpurchaseID', $request->deleteid)
                        ->delete();
                        return back();
        
                    }else{
                    return view('admin.adminsignalbuy')->with('datadeposits', $datadeposits);  
        
                }

        
    }
}
