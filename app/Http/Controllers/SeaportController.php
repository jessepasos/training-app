<?php

namespace App\Http\Controllers;

use App\Seaport;
use App\Ship;
use App\User;

use Illuminate\Http\Request;

use Log;
use Carbon;

class SeaportController extends Controller
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
        $seaports = Seaport::all();
        foreach($seaports as $seaport){
            $seaport->treasure_regenerated = $seaport->getTreasureRegeneratedSinceLastAction();
            $seaport->total_treasure = $seaport->getTotalTreasure();
        }


        return view('seaport.index', ['seaports' => $seaports]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seaport = new Seaport();
        $users = User::all();

        return view('seaport.new')->with(['seaport' => $seaport, 'users' => $users]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $seaport = new Seaport();
        Log::info($request);
        $seaport->name = $request->get('seaport_name');
        $seaport->treasure_amount = $request->get('seaport_treasure_amount');
        $seaport->user_id = $request->get('user_id');
        $seaport->save();

        return redirect()->back()->with('status', 'New seaport created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seaport = Seaport::find($id);
        $users = User::all();
        $time_since_last_action =  $seaport->findTimeSinceLastAction();
        $numTimeIntervals = $seaport->findNumTimeIntervals($time_since_last_action);
        $treasureRegenerated = $seaport-> getTreasureRegeneratedSinceLastAction();
        $totalTreasure = $seaport -> getTotalTreasure();

        return view('seaport.show')->with(['seaport' => $seaport, 'users' => $users, 'time_since_last_action' => $time_since_last_action, 'numTimeIntervals' => $numTimeIntervals, 'treasureRegenerated' => $treasureRegenerated, 'totalTreasure' => $totalTreasure]);
    }

    /**
     * Get attacked; set treasure_amount to 0 and update created_at with current time.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     */
    public function getAttacked($id, Request $request)
    {
        Log::info('ship_id is:');
        Log::info($request->get('ship_id'));

        $attack_ship_id = $request->get('ship_id');
        $seaport = Seaport::find($id);
        $attack_ship = Ship::find($attack_ship_id);

        $attack_ship->treasure_amount = $attack_ship->treasure_amount + $seaport->treasure_amount;
        $seaport->treasure_amount = 0;
        $formatted_time = Carbon\Carbon::now()->format('Y-m-d H:i:s');
        Log::info($formatted_time);
        $seaport->attacked_at = $formatted_time;
        $seaport->save();
        $attack_ship->save();

        return redirect()->back()->with('status', 'Got Attacked, treasure amount reset to 0');
    }


    /**
     * Get attacked; set treasure_amount to 0 and update created_at with current time.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getDeposit($id, Request $request)
    {
        Log::info('ship_id is:');
        Log::info($request->get('ship_id'));

        $deposit_ship_id = $request->get('ship_id');
        $seaport = Seaport::find($id);
        $deposit_ship = Ship::find($deposit_ship_id);

//        $deposit_ship -> treasure_amount = $deposit_ship -> treasure_amount + $seaport -> treasure_amount;
//        $seaport->treasure_amount = 0;
        $seaport->treasure_amount = $seaport->treasure_amount + $deposit_ship->treasure_amount;
        $deposit_ship->treasure_amount = 0;


        $formatted_time = Carbon\Carbon::now()->format('Y-m-d H:i:s');
        Log::info($formatted_time);
//        $seaport->attacked_at = $formatted_time;
        $seaport->save();
        $deposit_ship->save();

        return redirect()->back()->with('status', 'Deposited money into this port.');
    }

//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
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

        $seaport = Seaport::find($id);

        $seaport->name = $request->get('seaport_name');
        $seaport->treasure_amount = $request->get('seaport_treasure_amount');
        $seaport->user_id = $request->get('user_id');

        $seaport->save();

        return redirect()->back()->with('status', 'Profile saved!');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
