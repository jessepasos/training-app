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

    private function treasure_increase($amount)
    {
        $user= \Auth::user();
        $user->treasure += $amount;
        $user->save();
    }

    private function treasure_decrease($amount)
    {
        $user = \Auth::user();
        if($user->treasure < $amount){
            throw new TreasureInsufficientException('Not enough treasure');
        }
        $user->treasure -= $amount;
        $user->save();
    }

    /*
       try {
            $this->treasure_decrease(0);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    */

}