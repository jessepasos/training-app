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
            'extra_crew' => 0,
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
        $level = ShipLevel::find($ship->level);
        $ship->current_health = $level->max_health;
        $ship->save();
        return redirect()->back()->with('success', 'Ship Upgraded!');
    }

    public function shipStore(Request $request)
    {
        $shipIds = $request->get('ship_id');
        $crews = $request->get('new_crew');
        $cannons = $request->get('new_cannons');
        //go through and do all the interactions that will give credit.
        foreach($shipIds as $shipId) {
            $ship = Ship::find($shipId);
            if($ship->extra_crew > $crews[$shipId]) {
                $this->removeExtraCrew($shipId, $crews[$shipId]);
            }
            if($ship->current_cannons > $cannons[$shipId]) {
                $this->removeCannons($shipId, $cannons[$shipId]);
            }
        }
        //go through and do all the interactions that will take treasure.
        foreach($shipIds as $shipId) {
            $ship = Ship::find($shipId);
            if($ship->extra_crew < $crews[$shipId]) {
                $this->addExtraCrew($shipId, $crews[$shipId]);
            }
            if($ship->current_cannons > $cannons[$shipId]) {
                $this->addCannons($shipId, $cannons[$shipId]);
            }
        }
        return redirect()->back();
    }

    private function addExtraCrew($id, $new_crew)
    {
        $ship = Ship::find($id);
        try {
            $this->treasure_decrease($new_crew * 50);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Could not add crew to '+$ship->name);
        }
        $ship->extra_crew = $ship->extra_crew + $new_crew;
        $ship->save();

    }
    private function removeExtraCrew($id, $new_crew)
    {
        $ship = Ship::find($id);
        $this->treasure_increase($new_crew * 50);

        $ship->extra_crew = $ship->extra_crew - $new_crew;
        $ship->save();

    }

    private function addCannons($id, $new_cannons)
    {
        $ship = Ship::find($id);
        try {
            $this->treasure_decrease($new_cannons * 100);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Could not add cannons to '+$ship->name);
        }
        $ship->current_cannons = $ship->current_cannons + $new_cannons;
        $ship->save();
    }

    private function removeCannons($id, $new_cannons)
    {
        $ship = Ship::find($id);

        $this->treasure_increase($new_cannons * 100);

        $ship->current_cannons = $ship->current_cannons - $new_cannons;
        $ship->save();
    }
}
