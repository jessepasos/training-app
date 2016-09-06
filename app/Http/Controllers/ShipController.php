<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;
use Illuminate\Http\Request;

use App\Http\Requests;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function theBlackPerl()
    {
        $pirates = Pirate::all();

        return view('ships')->withPirates($pirates);
    }

    public function commandeer()
    {
        return view('commandeer');
    }

    public function saveShip(Request $request)
    {
        Ship::create([
            'user_id' => auth()->id(),
            'name' => $request->get('ship_name')
        ]);

        return redirect('/home');
    }
}
