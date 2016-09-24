<?php

namespace App\Http\Controllers;

use App\Ship;
use App\Pirate;
use App\Port;
use Input;
use Auth;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        view()->share('last_attack', Port::lastAttack());
    }

    public function commandeer()
    {
        return view('commandeer');
    }

    /**
     * @func      postCommandeer
     * @desc      Generates a new ship, associated with the current user.
     * @param     Request       $objRequest         HTTP Request
     * @return    view
     */
    public function postCommandeer(Request $objRequest)
    {
        // Save a new ship record:
        Ship::create(array(
            'user_id' => Auth::user()->id,
            'name'    => $objRequest->input('ship_name'),
        ));

        // Return to the home view:
        return view('home');
    }

    public function ship()
    {

        if (!Input::get()) {
            return view('ships');
        }

        // Return to the home view:
        return view('ships')
        ->with('ports', Port::all())
        ->with('ship', Ship::find(Input::get('ship_id')));
    }

}
