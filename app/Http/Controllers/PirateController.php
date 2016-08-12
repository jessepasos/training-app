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
}
