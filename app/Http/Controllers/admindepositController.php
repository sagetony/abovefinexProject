<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class admindepositController extends Controller

{
    public function __construct()
            {
                $this->middleware(['admin']);
            }

    public function index(){
        $datapas =  DB::table('packages')->get();
             
        $dataps =  DB::table('plans')->get();
 
        $datacs =  DB::table('coins')->get();
        
        return view ('admin.deposit')->with('datapas', $datapas)->with('dataps', $dataps)->with('datacs', $datacs);
    }

    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcnost"), 0, 12);
        return $pass;
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'package'=>'required',

            'plan'=>'required',
            
            ]);
       if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

       }
       if($request->package == 'Regular 200'){
           DB::table('deposits')->where('packages', 'Regular 200')->update(['planAmount'=> $request->plan]);

           if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Regular 200')->exists()){
                    $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Regular 200')->get();
                    foreach($datas as $data){
                        $id = $data->id;
                        $interest = $data->interest;
                        $plan = $data->planAmount;
                        $amount = $data->amount;
                        $new_interest = ($amount * $plan)/100 + $interest;
                        
                        DB::table('deposits')->where('id', $id)->where('packages', 'Regular 200')->update(['interest'=> $new_interest]);
                        
                        return back()->with('toast_success', 'Deposit Successful');                                
        
                }
           }else{
            return back()->with('toast_error', 'No data found');                                

        }

           
       }
       elseif($request->package == 'Regular 500'){
            DB::table('deposits')->where('packages', 'Regular 500')->update(['planAmount'=> $request->plan]);
            if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Regular 500')->exists()){
                $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Regular 500')->get();
                return dd($datas);
                foreach($datas as $data){
                    $id = $data->id;
                    $interest = $data->interest;
                    $plan = $data->planAmount;
                    $amount = $data->amount;
                    $new_interest = ($amount * $plan)/100 + $interest;
    
                    DB::table('deposits')->where('id', $id)->where('packages', 'Regular 500')->update(['interest'=> $new_interest]);
                    return back()->with('toast_success', 'Deposit Successful');                                
    
                }       
            }else{
                return back()->with('toast_error', 'No data found');                                

            }
           
        }

        elseif($request->package == 'Regular 1k'){
            DB::table('deposits')->where('packages', 'Regular 1k')->update(['planAmount'=> $request->plan]);
            if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Regular 1k')->exists()){
                $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Regular 1k')->get();
                return dd($datas);
                foreach($datas as $data){
                    $id = $data->id;
                    $interest = $data->interest;
                    $plan = $data->planAmount;
                    $amount = $data->amount;
                    $new_interest = ($amount * $plan)/100 + $interest;
    
                    DB::table('deposits')->where('id', $id)->where('packages', 'Regular 1k')->update(['interest'=> $new_interest]);
                    return back()->with('toast_success', 'Deposit Successful');                                
    
                }       
            }else{
                return back()->with('toast_error', 'No data found');                                

            }
           
        }
        elseif($request->package == 'Classic 2k'){
            DB::table('deposits')->where('packages', 'Classic 2k')->update(['planAmount'=> $request->plan]);
            if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Classic 2k')->exists()){
                $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Classic 2k')->get();
                return dd($datas);
                foreach($datas as $data){
                    $id = $data->id;
                    $interest = $data->interest;
                    $plan = $data->planAmount;
                    $amount = $data->amount;
                    $new_interest = ($amount * $plan)/100 + $interest;
    
                    DB::table('deposits')->where('id', $id)->where('packages', 'Classic 2k')->update(['interest'=> $new_interest]);
                    return back()->with('toast_success', 'Deposit Successful');                                
    
                }       
            }else{
                return back()->with('toast_error', 'No data found');                                

            }
           
        }
        elseif($request->package == 'Classic 5k'){
            DB::table('deposits')->where('packages', 'Classic 5k')->update(['planAmount'=> $request->plan]);
            if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Classic 5k')->exists()){
                $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Classic 5k')->get();
                return dd($datas);
                foreach($datas as $data){
                    $id = $data->id;
                    $interest = $data->interest;
                    $plan = $data->planAmount;
                    $amount = $data->amount;
                    $new_interest = ($amount * $plan)/100 + $interest;
    
                    DB::table('deposits')->where('id', $id)->where('packages', 'Classic 5k')->update(['interest'=> $new_interest]);
                    return back()->with('toast_success', 'Deposit Successful');                                
    
                }       
            }else{
                return back()->with('toast_error', 'No data found');                                

            }
           
        }
        elseif($request->package == 'Premium 20k'){
            DB::table('deposits')->where('packages', 'Premium 20k')->update(['planAmount'=> $request->plan]);
            if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Premium 20k')->exists()){
                $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Premium 20k')->get();
                return dd($datas);
                foreach($datas as $data){
                    $id = $data->id;
                    $interest = $data->interest;
                    $plan = $data->planAmount;
                    $amount = $data->amount;
                    $new_interest = ($amount * $plan)/100 + $interest;
    
                    DB::table('deposits')->where('id', $id)->where('packages', 'Premium 20k')->update(['interest'=> $new_interest]);
                    return back()->with('toast_success', 'Deposit Successful');                                
    
                }       
            }else{
                return back()->with('toast_error', 'No data found');                                

            }
           
        }
        elseif($request->package == 'Premium 50k'){
            DB::table('deposits')->where('packages', 'Premium 50k')->update(['planAmount'=> $request->plan]);
            if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Premium 50k')->exists()){
                $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Premium 50k')->get();
                return dd($datas);
                foreach($datas as $data){
                    $id = $data->id;
                    $interest = $data->interest;
                    $plan = $data->planAmount;
                    $amount = $data->amount;
                    $new_interest = ($amount * $plan)/100 + $interest;
    
                    DB::table('deposits')->where('id', $id)->where('packages', 'Premium 50k')->update(['interest'=> $new_interest]);
                    return back()->with('toast_success', 'Deposit Successful');                                
    
                }       
            }else{
                return back()->with('toast_error', 'No data found');                                

            }
           
        }
      
        else{

            DB::table('deposits')->where('packages', 'Premium 100k')->update(['planAmount'=> $request->plan]);
            if(DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Premium 100k')->exists()){
                $datas = DB::table('deposits')->where('status', 'CONFIRM')->where('dayCounter','>=' ,'30')->where('packages', 'Premium 100k')->get();
                return dd($datas);
                foreach($datas as $data){
                    $id = $data->id;
                    $interest = $data->interest;
                    $plan = $data->planAmount;
                    $amount = $data->amount;
                    $new_interest = ($amount * $plan)/100 + $interest;
    
                    DB::table('deposits')->where('id', $id)->where('packages', 'Premium 100k')->update(['interest'=> $new_interest]);
                    return back()->with('toast_success', 'Deposit Successful');                                
    
                }       
            }else{
                return back()->with('toast_error', 'No data found');                                

            }

     
        }
       
    }
}
