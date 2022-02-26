<?php

namespace App\Http\Controllers;

use App\Models\signal;
use Nexmo\Laravel\Facade\Nexmo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class smsController extends Controller
{

    public function __construct()
            {
                $this->middleware(['admin']);
            }
    
    public function index(){
        return view('admin.signal');
    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcnost"), 0, 12);
        return $pass;
    }
    public function sendSmsNotificaition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'msg'=>'required',
            
            
            ]);
       if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

       }
        $datas = DB::table('signalbuys')->where('status', 'CONFIRM')->where('dayCounter','>', 0)->get();

        foreach($datas as $data){
            $phone = $data->phone;
            $companyName = 'AboveFinex';

            Nexmo::message()->send([
                'to' => $phone,
                'from' => $companyName,
                'text' => $request->msg.' '.'(APPLY PROPER RISK MANAGEMENT)',
           ]);
    
                
        }
 
        // Email
        signal::create([
            'signalID' => $this->randomDigit(),
            'Message' => $request->msg,
            'T2' => '',
            'SL' => '',
            'entry'=> '',
            'currencypairs'=> '',
            'order' => '',
            'status' => 'CONFIRM',
        ]);
        return back()->with('toast_success', 'Signal Sent Successful');                                

  
        // $basic  = new \Nexmo\Client\Credentials\Basic('Nexmo key', 'Nexmo secret');
        // $client = new \Nexmo\Client($basic);
 
        // $message = $client->message()->send([
        //     'to' => '9197171****',
        //     'from' => 'John Doe',
        //     'text' => 'A simple hello message sent from Vonage SMS API'
        // ]);
 
        // dd('SMS message has been delivered.');
    }
}
