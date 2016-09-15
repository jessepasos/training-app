<?php

namespace App\Http\Controllers;

use App\Exceptions\TreasureInsufficientException;
use App\Pirate;
use App\ShipRole;
use App\Ship;
use App\User;
use Illuminate\Http\Request;



use App\Http\Requests;
use App\Exceptions\ShipUnavailableException;

class PirateController extends Controller
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
    public function index($id)
    {
        $pirate = Pirate::find($id);

        return view('pirates')->withPirate($pirate);
    }

    public function new(Request $request)
    {
        try {
            $this->treasure_decrease(500);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        if($request->ship_id != "NULL"){
            try {
                $this->checkThatShipIsAvailable($request);
            } catch(\Exception $e) {
                // Make the pirate not on the given ship.
                Pirate::create([
                    'user_id'=>auth()->id(),
                    'ship_id'=>$request->get('NULL'),
                    'name'=>$request->get('pirate_name'),
                    'rank_id'=>$request->get('rank_id'),
                    'saltiness' => '0']);

                return redirect()->back()->with('error', $e->getMessage());
            }
            try {
                $this->checkThatRankIsAvailable($request);
            } catch(\Exception $e) {
                Pirate::create([
                    'user_id'=>auth()->id(),
                    'ship_id'=>$request->get('ship_id'),
                    'name'=>$request->get('pirate_name'),
                    'rank_id'=>$request->get('NULL'),
                    'saltiness' => '0']);

            return redirect()->back()->with('error', 'This rascal needs to get his sea legs before challenging another crew member.');
            }
        }

        Pirate::create([
            'user_id'=>auth()->id(),
            'ship_id'=>$request->get('ship_id'),
            'name'=>$request->get('pirate_name'),
            'rank_id'=>$request->get('rank_id'),
            'saltiness' => '0']);

        return redirect()->back()->with('success', 'Pirate Created!');
    }

    public function update(Request $request)
    {
        if($request->ship_id != "NULL"){
            try {
                $this->checkThatShipIsAvailable($request);
            } catch(\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
            if($this->checkThatRankIsAvailable($request)){
                $this->pirateDuel($request);
                return redirect()->back()->with('error', 'pirate duel');
            }
        }
        $pirate = Pirate::find($request->get('pirate_id'));

        $pirate->ship_id = $request->get('ship_id');
        $pirate->name = $request->get('pirate_name');
        $pirate->rank_id = $request->get('rank_id');

        $pirate->save();

        return redirect()->back()->with('success', 'Ahoy! Pirate saved');
    }

    private function checkThatRankIsAvailable(Request $request)
    {
        //check if rank is already taken.
        $sameRank = Pirate::where('ship_id', $request->ship_id)
            ->where('rank_id', $request->rank_id)
            ->where('rank_id', '!=', 'NULL');
        if($sameRank->count() > 0){
            return true;
        }
        return false;
    }

    private function checkThatShipIsAvailable(Request $request)
    {
        // Ensure that the ship is able to hold more crew.
        $ship = Ship::find($request->ship_id);
        $pirate = Pirate::find($request->get('pirate_id'));
        if ($ship->getRemainingCapacity() < 1 && $pirate->ship_id != $ship->id) {
            throw new ShipUnavailableException('Yarr. The ship does not need any more crew.');
        }
    }

    private function pirateDuel(Request $request)
    {
        //check if rank is already taken.
        $sameRank = Pirate::where('ship_id', $request->ship_id)
            ->where('rank_id', $request->rank_id)
            ->where('rank_id', '!=', 'NULL');

        //choose which pirate will get the rank. unassign the other pirate.
        //the pirate with the greatest saltiness takes rank, if equal, then the original pirate keeps rank.
        if($sameRank->count() > 0){
            $otherPirate = $sameRank->first();
            $contestingPirate = Pirate::find($request->get('pirate_id'));
            if($otherPirate->saltiness >= $contestingPirate->saltiness){
                //contesting pirate loses his rank, and original pirate stays the same.
                $contestingPirate->rank_id = 'NULL';
                $contestingPirate->save();
            } else{
                //contesting pirate gets new rank, and original pirate loses his rank.
                $otherPirate->rank_id = 'NULL';
                $otherPirate->save();
                $this->update($request);
            }
        }
    }
}
