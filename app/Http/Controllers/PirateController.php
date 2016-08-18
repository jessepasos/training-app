<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;
use App\User;
use Illuminate\Http\Request;
use Log;
use Auth;

class PirateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web']);
        if (Auth::guard('admin')->user()) {
            $this->pirates = Pirate::all();
            $this->ships = Ship::all();
        } elseif (Auth::guard('user')->user()) {
            $this->pirates = Auth::user()->pirates()->get();
            $this->ships = Auth::user()->ships()->get();
        } else {
            $this->pirates = NULL;
            $this->ships = NULL;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pirate.index')->withPirates($this->pirates);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pirate = Pirate::find($id);
        $ships = Ship::All();
        $users = User::All();
        return view('pirate.show')->withPirate($pirate)->withShips($this->ships)->withUsers($users);
    }

    public function update($id, Request $request)
    {
        Log::info($request);
        $pirate = Pirate::find($id);
        $pirate->name = $request->get('pirate_name');
        $pirate->attributes = $request->get('attributes');
        $pirate->rank = $request->get('rank');
        $pirate->ship_id = $request->get('ship_id');

        $pirate->user_id = $request->get('user_id');

        $pirate->save();
        return redirect()->back()->with('status', 'Profile saved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('inside store pirate method');
        $pirate = new Pirate();
        Log::info($request);
        $pirate->name = $request->get('pirate_name');
        $pirate->attributes = $request->get('attributes');
        $pirate->rank = $request->get('rank');
        $pirate->ship_id = $request->get('ship_id');

        $pirate->user_id = $request->get('user_id');

        $pirate->save();
        return redirect()->back()->with('status', 'Profile saved!');
    }

    public function removeFromShip($id)
    {
        Log::info('in remove pirate from ship function');
        $pirate = pirate::find($id);
        $pirate -> ship_id = NULL;
        $pirate->save();
        return redirect()->back()->with('status', 'Pirate was removed from this ship');
    }

    public function findFreeAgents(){
//        $pirate = pirate::
        $free_agents = Pirate::where('ship_id', '=', NULL);
        return $free_agents;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pirate = new Pirate();
        $ships = Ship::All();
        $users = User::All();
        return view('pirate.new')->withPirate($pirate)->withShips($ships)->withUsers($users);
    }






}
