<?php

namespace App\Http\Controllers;

use App\Port;
use App\Ship;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Input;

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

    /**
     * @func      commandeer
     * @desc      Load the commandeer view.
     * @return    view
     */
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

    /**
     * @func      ship
     * @desc      description
     * @return    view
     */
    public function ship()
    {
        // Return to the home view:
        return view('ships')
            ->with('ports', Port::all())
            ->with('ship', Ship::find(Input::get('ship_id')));
    }

    /**
     * @func      createShip
     * @desc      Create a new ship entry.
     * @param     Request       $objRequest         HTTP Request
     * @return    view
     */
    public function createShip(Request $objRequest)
    {
        // Update users funds:
        User::find(Auth::user()->id)
            ->update([
                'funds' => Auth::user()->funds - 200,
        ]);

        // Save a new ship record:
        Ship::create(array(
            'user_id'      => Auth::user()->id,
            'name'         => $objRequest->input('ship_name'),
            'captain'      => $objRequest->input('captain'),
            'rank'         => $objRequest->input('rank'),
            'displacement' => $objRequest->input('displacement'),
            'length'       => $objRequest->input('length'),
            'draft'        => $objRequest->input('draft'),
            'saltiness'    => $objRequest->input('saltiness'),
            'cannons'      => $objRequest->input('cannons'),
            'rank'         => 99,
        ));

        // Redirect to home view:
        return redirect('home');
    }

    /**
     * @func      manageShip
     * @desc      Update existing ship record.
     * @param     Request       $objRequest         HTTP Request
     * @return    view
     */
    public function manageShip(Request $objRequest)
    {
        // Update current ship:
        Ship::find($objRequest->input('id'))
            ->update([
                'captain'      => $objRequest->input('captain'),
                'rank'         => $objRequest->input('rank'),
                'displacement' => $objRequest->input('displacement'),
                'length'       => $objRequest->input('length'),
                'draft'        => $objRequest->input('draft'),
                'saltiness'    => $objRequest->input('saltiness'),
                'cannons'      => $objRequest->input('cannons'),
        ]);

        // Check for ship name field:
        if ($objRequest->input('ship_name')) {
            Ship::find($objRequest->input('id'))
                ->update([
                    'ship_name' => $objRequest->input('ship_name'),
            ]);
        }

        // Check for ship rank field:
        if ($objRequest->input('ship_rank')) {
            Ship::find($objRequest->input('id'))
                ->update([
                    'rank' => $objRequest->input('ship_rank'),
            ]);
        }

        // Return home view:
        return view('home');
    }

}
