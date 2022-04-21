<?php

namespace App\Http\Controllers;

use App\Models\signal;
use Nexmo\Laravel\Facade\Nexmo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;


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
        // if(request()->isMethod("post")){
        //     //Twilio SMS integration
        //     $to = '+2348102983659';
        //     $from = getenv("TWILIO_FROM");
        //     $message = 'sdsdsdk';
        //     //open connection

        //     $ch = curl_init();

        //     //set the url, number of POST vars, POST data
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
        //     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        //     curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
        //     curl_setopt($ch, CURLOPT_POST, 3);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);

        //     // execute post
        //     $result = curl_exec($ch);
        //     $result = json_decode($result);

        //     // close connection
        //     curl_close($ch);
        //     //Sending message ends here
        //     // return [$result];

        //     return back()->with('toast_success', 'Signal Sent Successful');                                

        // }

// function getPhoneNumbers($datas, $phone){
//         if(count($datas) == 0){
//             return null;
//         }

//         $datas = [];

//         foreach($datas as $k => $eachUserObject){
//             $datas[] = $eachUserObject->$phone;
//         }

//         return implode(',', $datas);

//     }


$datas = DB::table('signalbuys')->where('status', 'CONFIRM')->get('phone');

 $data = [];

        foreach($datas as $k => $eachUserObject){
            $data[] = $eachUserObject->phone;
        }
       
    $phones = implode(",", $data);
  
  
$username = 'broeverest@gmail.com';
$password = 'Steve123';
$sender = 'TEAM EHUB';
$message = $request->msg;
// Separate multiple numbers by comma
$mobiles = $phones;
// Set your domain's API URL
$api_url = 'https://account.kudisms.net/api/';
//Create the message data
$data = array('username'=>$username, 'password'=>$password, 'sender'=>$sender,
'message'=>$message, 'mobiles'=>$mobiles);
//URL encode the message data
$data = http_build_query($data);
//Send the message
$ch = curl_init(); // Initialize a cURL connection
curl_setopt($ch,CURLOPT_URL, $api_url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
$result = json_decode($result);
if(isset($result->status) && strtoupper($result->status) == 'OK')
{
 // Message sent successfully, do anything here
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
    
}
else if(isset($result->error))
{
 // Message failed, check reason.
         return back()->with('toast_error', 'Message failed - error: '.$result->error);   

// return dd('Message failed - error: '.$result->error); 
}
else
{
 // Could not determine the message response.
 return back()->with('toast_error', 'Unable to process request');  

        }
                                     
    
    }
}
