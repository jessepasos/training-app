<?php

namespace App\Http\Controllers;

use App\AttackPort;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attackPorts = AttackPort::all();
        $user= \Auth::user();
        return view('home')->with('attackPorts',$attackPorts)->with('user',$user);
    }
}
