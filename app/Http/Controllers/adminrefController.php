<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminrefController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
                $datarefs = DB::table('bonuses')
                ->get();
        
                return view('admin.adminreferral')->with('datarefs', $datarefs);  

                

        
    }
}
