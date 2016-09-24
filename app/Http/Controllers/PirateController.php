<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class PirateController extends Controller
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
     * @func      createPirate
     * @desc      Generates a new priate.
     * @param     Request       $objRequest         HTTP Request
     * @return    view
     */
    public function createPirate(Request $objRequest)
    {

        // Save a new ship record:
        Pirate::create(array(
            'user_id' => Auth::user()->id,
            'name'    => $objRequest->input('pirate_name'),
            'rank'    => $objRequest->input('rank'),
        ));

        // Return to the home view:
        return view('home');
    }
}
