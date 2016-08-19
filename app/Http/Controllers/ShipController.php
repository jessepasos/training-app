<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;
use App\Seaport;
use App\User;

use Illuminate\Http\Request;

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
    }

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
        $seaports = Seaport::all();
        $users = User::all();

        return view('ship.new')->with(['seaports' => $seaports, 'users' => $users, 'ship' => $ship]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ship = new Ship();
        $seaports = Seaport::all();
        $users = User::all();

        return view('ship.new')->with(['seaports' => $seaports, 'users' => $users, 'ship' => $ship]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ship = new Ship();

        Log::info($request);

        $ship_attributes = [
            'name',
            'displacement',
            'length',
            'draft',
            'crew_saltiness',
            'num_cannons',
            'seaport_id',
            'user_id'
        ];

        foreach ($ship_attributes as $ship_attribute) {
            $ship->{$ship_attribute} = $request->get('ship_' . $ship_attribute);
        }

        $ship->save();

        return redirect()->back()->with('status', 'New ship created!');
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

        $ship_attributes = [
            'name',
            'displacement',
            'length',
            'draft',
            'crew_saltiness',
            'num_cannons',
            'seaport_id',
            'user_id'
        ];

        foreach ($ship_attributes as $ship_attribute) {
            $ship->{$ship_attribute} = $request->get('ship_' . $ship_attribute);
        }

        $ship->save();

        return redirect()->back()->with('status', 'ship updated!');
    }
}
