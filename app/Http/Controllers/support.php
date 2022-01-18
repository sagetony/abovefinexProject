<?php

namespace App\Http\Controllers;

use App\Models\support as ModelsSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class support extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = DB::table('supports')->where('email', auth()->user()->email)->get();

        return view('user.support')->with('data', $data);

    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789"), 0, 5);
        return $pass;
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'title'=>'required',
            'message'=>'required',
            ]);

       if($validator->fails()){
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

       }

       ModelsSupport::create([
            'ticketID' => $this->randomDigit(),
            'email' => $request->email,
            'title' => $request->title,
            'msg' => $request->message,
            'status' => 'PENDING',
       ]);

       return back()->with('toast_success', 'Ticket has been created');

    }
}
