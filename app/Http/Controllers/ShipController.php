<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;
use App\ShipLevel;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use Traits\treasure;

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
        try {
            $this->treasure_decrease(1000);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        $level = ShipLevel::find($request->get('level'));
        Ship::create([
            'user_id' => auth()->id(),
            'name' => $request->get('ship_name'),
            'level' => $request->get('level'),
            'current_health' => $level->max_health,
            'current_crew' => 0,
            'current_cannons' => 1
        ]);

        return redirect('/home');
    }

    public function shipLevelUp(Request $request)
    {
        $ship = Ship::find($request->get('id'));

        try {
            $this->treasure_decrease($ship->levelDetails->cost);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        $ship->level = $ship->level + 1;
        dd($ship->levelDetails->max_health);
        $ship->current_health = $ship->levelDetails->max_health;
        $ship->save();
        return redirect()->back()->with('success', 'Ship Upgraded!');
    }
}
