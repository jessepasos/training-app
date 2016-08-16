<?php

namespace App\Http\Controllers;

use App\Pirate;
use Illuminate\Http\Request;

use App\Http\Requests;


use Log;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pirate = Pirate::find($id);

        return view('pirate')->withPirate($pirate);
    }

    public function store($id, Request $request)
    {

        Log::info($request);
        $pirate = Pirate::find($id);

        $pirate->name = $request->get('pirate_name');
        $pirate->attributes = $request->get('attributes');
        $pirate->rank = $request->get('rank');

        $pirate->save();

        return redirect()->back()->with('status', 'Profile saved!');
    }


    public function removeFromShip($id)
    {
        Log::info('in remove pirate from ship function');
        $pirate = pirate::find($id);
        $pirate -> ship_id = NULL;

//        $black_perl = pirate::where('name', '=', 'Port Royal')->first();
////        Log::info(var_dump($black_perl));
//        $black_perl -> treasure_amount = $black_perl -> treasure_amount + $pirate -> treasure_amount;

//        $pirate->treasure_amount = 0;
//        $formatted_time = Carbon\Carbon::now()->format('Y-m-d H:i:s');
//        Log::info($formatted_time);
//        $pirate->attacked_at = $formatted_time;

        $pirate->save();
//        $black_perl->save();
        return redirect()->back()->with('status', 'Pirate was removed from this ship');
    }



}
