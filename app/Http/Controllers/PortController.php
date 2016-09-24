<?php

namespace App\Http\Controllers;

use App\Port;
use App\Ship;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Input;

class PortController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        view()->share('ports', Port::all());
        view()->share('last_attack', Port::lastAttack());
    }

    public function ports(Request $objRequest)
    {
        return view('ports');
    }

    public function attack()
    {
        if (!Input::get()) {
            return view('ports');
        }

        $objPorts = Port::where('name', Input::get('port'))->get();

        foreach($objPorts as $arrPort) {

        	$intTreasure = $arrPort->treasure_amount + Auth::user()->funds;

        	User::find(Auth::user()->id)
        	->update([
        		'funds' => $intTreasure,
        	]);

        	Port::find($arrPort->id)
        	->update([
        		'attacked_at' => date('Y-m-d H:i:s'),
        		'treasure_amount' => 0,
        	]);
        }

        return redirect('/ports');
    }
}
