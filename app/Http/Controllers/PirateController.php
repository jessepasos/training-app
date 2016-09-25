<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;
use App\User;
use Auth;
use Illuminate\Http\Request;

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
        // Update user funds:
        User::find(Auth::user()->id)
            ->update([
                'funds' => Auth::user()->funds - 50,
        ]);

        // Save a new ship record:
        Pirate::create(array(
            'user_id' => Auth::user()->id,
            'name'    => $objRequest->input('pirate_name'),
            'rank'    => $objRequest->input('rank'),
        ));

        // Redirect to the home view:
        return redirect('home');
    }

    /**
     * @func      managePirate
     * @desc      Update pirate information
     * @param     Request       $objRequest         HTTP Request
     * @return    view
     */
    public function managePirate(Request $objRequest)
    {
        // Update ship captain data:
        Ship::find($objRequest->input('ship_id'))
            ->update([
                'captain' => $objRequest->input('pirate_name'),
        ]);

        // Update pirate data:
        Pirate::find($objRequest->input('id'))
            ->update([
                'name'    => $objRequest->input('pirate_name'),
                'rank'    => $objRequest->input('rank'),
                'ship_id' => $objRequest->input('ship_id'),
        ]);

        // Return to the home view:
        return redirect('home');
    }
}
