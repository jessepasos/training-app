<?php

namespace App\Http\Controllers;

use App\AttackPort;
use App\Ship;
use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

class AttackController extends Controller
{
    use Traits\treasure;
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
    public function index()
    {
        $attackPorts = AttackPort::all();
        return view('attack')->with('attackPorts',$attackPorts);
    }

    public function attack(Request $request)
    {
        $attack = AttackPort::find($request->get('port'));
        $ships = Ship::find($request->get('ships'));

        $attack->attacked_at = Carbon::now();
        //Check the max cargo on all attacking ships.
        //Take the lesser of max cargo or half the treasure amount of the port.
        $maxLoot = 0;
        foreach($ships as $ship){
            $maxLoot += ($ship->levelDetails->max_cargo * 100);
        }
        $loot = $attack->treasure_amount/2;
        if($loot > $maxLoot){
            $this->treasure_increase($maxLoot);
        } else{
            $this->treasure_increase($loot);
        }
        $attack->treasure_amount /= 2;

        $attack->save();

        return redirect()->back()->with('success', 'Port successfully attacked!');
    }
}
