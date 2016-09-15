<?php
/**
 * Created by PhpStorm.
 * User: datanerds
 * Date: 2016-09-15
 * Time: 1:59 PM
 */

namespace App\Http\Controllers\Traits;

use App\Exceptions\TreasureInsufficientException;

trait treasure
{

    public function treasure_increase($amount)
    {
        $user= \Auth::user();
        $user->treasure += $amount;
        $user->save();
    }

    public function treasure_decrease($amount)
    {
        try {
            $this->treasure_check($amount);
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        $user = \Auth::user();
        $user->treasure -= $amount;
        $user->save();

    }
    private function treasure_check($amount){
        $user= \Auth::user();
        if($user->treasure < $amount){
            throw new TreasureInsufficientException('Not enough treasure');
        }
    }
}