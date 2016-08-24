<?php

namespace App\Http\Controllers;

use App\Seaport;
use App\Ship;
use App\User;

use Illuminate\Http\Request;

use Log;
use Carbon;
use Response;

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
        foreach ($seaports as $seaport) {
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
        $time_since_last_action = $seaport->findTimeSinceLastAction();
        $numTimeIntervals = $seaport->findNumTimeIntervals($time_since_last_action);
        $treasureRegenerated = $seaport->getTreasureRegeneratedSinceLastAction();
        $totalTreasure = $seaport->getTotalTreasure();

        return view('seaport.show')->with([
            'seaport'                => $seaport,
            'users'                  => $users,
            'time_since_last_action' => $time_since_last_action,
            'numTimeIntervals'       => $numTimeIntervals,
            'treasureRegenerated'    => $treasureRegenerated,
            'totalTreasure'          => $totalTreasure
        ]);
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


//        require the following regardless of whether attack succeeds or not
        $attack_ship_id = $request->get('ship_id');
        $seaport = Seaport::find($id);
        $attack_ship = Ship::find($attack_ship_id);
        $attack_ship->num_attacks = $attack_ship->num_attacks - 1;


        $rand = rand(1, 10);
        if ($rand > 8) {
//        require the below if attack succeeds
            $attack_ship->treasure_amount = $attack_ship->treasure_amount + $seaport->getTotalTreasure() / 2.0;
            $seaport->treasure_amount = $seaport->getTotalTreasure() / 2.0;
            $formatted_time = Carbon\Carbon::now()->format('Y-m-d H:i:s');
            Log::info($formatted_time);
            $seaport->attacked_at = $formatted_time;
//            $attack_ship->num_attacks = 0;
            $attack_ship->num_attacks = $attack_ship->max_num_attacks;
            $status_message = 'Attacked this seaport, your ship takes half the seaports treasure and num_chances was reset';
        } elseif ($attack_ship->num_attacks == 0) {
//        if attack does not succeed

            $attack_ship->current_hit_points = $attack_ship->current_hit_points - 0.2 * ($attack_ship->max_hit_points);

            if ($attack_ship->current_hit_points <= 0) {
//                Ship::destroy($attack_ship->id);
//                ShipController::removeShip($attack_ship->id);
//                $ship = Ship::find($id);
                $attack_ship->pirates()->delete();
                $attack_ship->delete();

                return redirect()->back()->with('status', 'ship had no hp and was destroyed');
            }

            $attack_ship->num_attacks = $attack_ship->max_num_attacks;
            $status_message = 'attack failed and you were on your last chance. hit points was reduced by 20 percent but num attacks has been reset';
        } else {
            $status_message = 'attack failed';
        }
        $seaport->save();
        $attack_ship->save();

        return redirect()->back()->with('status', $status_message);
    }

    public function getNumAttacks($seaport_id)
    {
        Log::info('in get num attacks function');
        $seaport = Seaport::find($seaport_id);
        $attack_ships = $seaport->ships()->get();

        Log::info($attack_ships);

        $num_attacks_array = [];

        foreach ($attack_ships as $attack_ship) {
            $num_attacks_array["numAttacks" . $attack_ship->id] = $attack_ship->num_attacks;
        }

        Log::info($num_attacks_array);

        $type = 'json';

        return Response::json($num_attacks_array)->header('Content-Type', $type);
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

        $seaport->treasure_amount = $seaport->getTotalTreasure() + $deposit_ship->treasure_amount;
        $deposit_ship->treasure_amount = 0;

        $formatted_time = Carbon\Carbon::now()->format('Y-m-d H:i:s');
        Log::info($formatted_time);
        $seaport->save();
        $deposit_ship->save();

        return redirect()->back()->with('status', 'Deposited money into this port.');
    }


    /**
     * Get attacked; set treasure_amount to 0 and update created_at with current time.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function repairShip($id, Request $request)
    {
        Log::info('ship_id is:');
        Log::info($request->get('ship_id'));

        $deposit_ship_id = $request->get('ship_id');
        $seaport = Seaport::find($id);
        $deposit_ship = Ship::find($deposit_ship_id);

//        $deposit_ship->current_hit_points =  $deposit_ship->current_hit_points + 0.1 * ($deposit_ship->max_hit_points);
        $deposit_ship->current_hit_points =  min($deposit_ship->current_hit_points + 0.1 * ($deposit_ship->max_hit_points), $deposit_ship->max_hit_points) ;

        $seaport->treasure_amount = $seaport->getTotalTreasure() - 1;


//        $seaport->treasure_amount = $seaport->getTotalTreasure() + $deposit_ship->treasure_amount;
//        $deposit_ship->treasure_amount = 0;
//
//        $formatted_time = Carbon\Carbon::now()->format('Y-m-d H:i:s');
//        Log::info($formatted_time);
        $seaport->save();
        $deposit_ship->save();

        return redirect()->back()->with('status', 'ship can be repaired at the cost of 1 piece of gold for 10 percent damage');
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
        $seaport->defensive_rating = $request->get('seaport_defensive_rating');

        $seaport->save();

        return redirect()->back()->with('status', 'Profile saved!');
    }

    public function findValuesSinceLastActionJSON($id)
    {
        $seaport = Seaport::find($id);
        $seaport->timeSinceLastAction = $seaport->findTimeSinceLastAction();
        $seaport->totalTreasure = $seaport->getTotalTreasure();

        return Response::json($seaport);
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
