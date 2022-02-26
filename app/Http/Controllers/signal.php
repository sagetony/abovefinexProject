<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class signal extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = DB::table('signals')->orderByDesc('id')->paginate(1);
        return view('user.signal')->with('data', $data);
    }
}
