<?php

namespace App\Http\Controllers;

use App\Ship;
use App\Pirate;
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

}
