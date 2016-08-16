<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;

use Illuminate\Http\Request;

use App\Http\Requests;
use Log;

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

        return view('the-ship')->withPirates($pirates);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships = Ship::all();
        return view('ship.index')->withShips($ships);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ship = Ship::find($id);
        return view('ship.show')->withShip($ship);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info($request);
        $ship = Ship::find($id);
        $ship->name = $request->get('ship_name');
        $ship->displacement = $request->get('ship_displacement');
        $ship->length = $request->get('ship_length');
//        $ship->treasure_amount = $request->get('ship_treasure_amount');
        $ship->save();
        return redirect()->back()->with('status', 'Profile saved!');
    }


}
