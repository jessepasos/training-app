<?php

namespace App\Http\Controllers;

use App\AttackPort;
use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

class AttackController extends Controller
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
        return view('attack')->with('attackPorts',$attackPorts);
    }

    public function attack(Request $request)
    {
        $attack = AttackPort::where('name', $request->get('port'))->first();

        $attack->attacked_at = Carbon::now();
        $attack->treasure_amount = '0';

        $attack->save();

        return redirect()->back()->with('success', 'Port successfully attacked!');
    }
}
