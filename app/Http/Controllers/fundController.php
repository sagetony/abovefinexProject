<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = DB::table('fundwallets')
            ->where('user_id', auth()->user()->userID)
            ->sum('amount');
            $rate = DB::table('currency_rates')->first();
            $datadeposit =  DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->sum('amount');
        $datadepositi =  DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->sum('interestcap');
        $datainterest =  DB::table('deposits')
                    ->where('userID', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->sum('interest');
       $databonus =  DB::table('bonuses')
                    ->where('referralname', auth()->user()->username)
                    ->sum('amount');
            
        $datawit =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->sum('amount');
  $datawiti =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'Interest')
                    ->sum('amount');
                    $datasignal =  DB::table('signalbuys')
                    ->where('userID', auth()->user()->userID)
                    ->sum('amount');
                $datarobot =  DB::table('robots')
                    ->where('userID', auth()->user()->userID)
                    ->sum('amount');
                    $datawitw =  DB::table('withdraws')
                    ->where('user_id', auth()->user()->userID)
                    ->where('status', 'CONFIRM')
                    ->where('type_withdraw', 'wallet')
                    ->sum('amount');

        return view ('user.fund')->with('data', $data)->with('datawit', $datawit)->with('databonus', $databonus)->with('datainterest', $datainterest)->with('datadeposit', $datadeposit)->with('datawiti', $datawiti)->with('datarobot', $datarobot)->with('datasignal', $datasignal)->with('datawitw', $datawitw)->with("rate", $rate);

    }

    public function verify( Request $request){
                    $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$request->transaction_id}/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-302d9e1e4e013358ed28e03f9cb3ba2c-X"
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $res = json_decode($response);
          if($res->status == 'success'){
                DB::table('fundwallets')
                    ->insert([
                    'transaction_id' => $res->data->tx_ref,
                    'user_id' => auth()->user()->userID,
                    'name' => $res->data->customer->name,
                    'email' => $res->data->customer->email,
                    'amount' =>$res->data->amount,
                    'status' =>$res->status,
                    'payment_type' =>$res->data->payment_type,
        ]);
        return back()->with('toast_success', 'Transaction Successfull !!');
        

          }else {
              return back()->with('toast_error', 'Failed transaction');
          }
    }
}
