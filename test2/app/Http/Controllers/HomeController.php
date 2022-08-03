<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role2 = auth()->user()->struktural;   
        $role = auth()->user()->fungsional;   
        $enableButton = false;
        $enableButton2 = false;
        if($role == '02'){
            $enableButton = true;
        }
        if($role2 == 'manajer'){
            $enableButton2 = true;
        }
        return view('home')->with('enableButton', $enableButton)->with('enableButton2', $enableButton2);
        
    }
}
