<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;

use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use Auth;

class ShipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
//        $this->middleware('auth');
    }

//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function theBlackPerl()
//    {
//        $pirates = Pirate::all();
//
//        return view('the-ship')->withPirates($pirates);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()) {
            $ships = Ship::all();
        } elseif (Auth::guard('user')->user()) {
            $user_id = Auth::id();
            Log::info($user_id);
            $ships = Ship::where('user_id', '=', $user_id)->get();
        }
        $pirates = Pirate::all();
        return view('ship.index')->withShips($ships)->withPirates($pirates);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ship = Ship::find($id);
//        $pirates = Ship::find($id) -> pirates();

        $pirates = $ship->pirates()->get();
        return view('ship.show')->withShip($ship)->withPirates($pirates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info($request);
        $ship = Ship::find($id);

        $ship_attributes = ['name', 'displacement', 'length', 'draft', 'crew_saltiness', 'num_cannons'];
        foreach ($ship_attributes as $ship_attribute) {
            $ship->{$ship_attribute} = $request->get('ship_' . $ship_attribute);
        }

        $ship->save();
        return redirect()->back()->with('status', 'Profile saved!');
    }


}
