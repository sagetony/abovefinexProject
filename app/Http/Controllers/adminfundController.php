<?php

namespace App\Http\Controllers;

use App\Mail\EmailFunding;
use App\Models\deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class adminfundController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){
                $datadeposits = DB::table('fundwallets')->orderByDesc('id')
                ->paginate(15);

                if(isset($request->confirmid)){
                    DB::table('fundwallets')
                    ->where('transaction_id', $request->confirmid)
                    ->update(['status' => 'success']);
                    return back();
                    // email....
        
                    // $details = [
                    //     'name' => $datauser->firstname.' '.$datauser->lastname,
                    //     'amount' => $datadepo->amount,
                        
                    //     'id' => $datadepo->transaction_id,
                    // ]; 
        
                    // Mail::to($datauser->email)->send(new EmailFunding($details));
        
                    return back();
                
                }elseif(isset($request->unconfirmid)){
                        DB::table('fundwallets')
                            ->where('transaction_id', $request->unconfirmid)
                            ->update(['status' => 'PENDING']);
                            return back();
        
                    }elseif(isset($request->deleteid)){
                        DB::table('fundwallets')
                        ->where('transaction_id', $request->deleteid)
                        ->delete();
                        return back();
        
                    }else{
                    return view('admin.adminfunding')->with('datadeposits', $datadeposits);  
        
                }

        
    }
}
