<?php

namespace App\Http\Controllers;

use App\Port;
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

    /**
     * @func      ports
     * @desc      description
     * @param     Request       $objRequest         HTTP Request
     * @return    view
     */
    public function ports(Request $objRequest)
    {
        return view('ports');
    }

    /**
     * @func      attack
     * @desc      Attack a port.
     * @return    view
     */
    public function attack()
    {
        if (!Input::get()) {
            return view('ports');
        }

        // Get current port:
        $objPorts = Port::where('name', Input::get('port'))->get();

        // Cycle through responses:
        foreach ($objPorts as $arrPort) {

            // Update users funds:
            User::find(Auth::user()->id)
                ->update([
                    'funds' => $arrPort->treasure_amount + Auth::user()->funds,
            ]);

            // Update port status:
            Port::find($arrPort->id)
                ->update([
                    'attacked_at'     => date('Y-m-d H:i:s'),
                    'treasure_amount' => 0,
            ]);
        }

        // Redirect to ports view:
        return redirect('/ports');
    }
}
