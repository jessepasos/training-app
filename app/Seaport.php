<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Log;


class Seaport extends Model
{
    protected $attributes = [
        'name'            => 'Default seaport',
        'treasure_amount' => 100,
    ];

//    protected $fillable = [
//        'name',
//        'treasure_amount',
//    ];
    public function getTreasureAmount(){
        return $this->treasure_amount;
    }


    public function parseDate($date)
    {
        return Carbon::parse($date);
    }

    public function findTimeSinceLastAction()
    {
        $now = Carbon::now();
        $parsedDate = $this->parseDate($this->attacked_at);
        $totalDuration = $now->diffInSeconds($parsedDate);

        return $totalDuration;
    }

    public function findNumTimeIntervals($seconds)
    {
        $numTimeIntervals = (int)($seconds / 15);
        return $numTimeIntervals;
    }

    public function findTreasureRegeneratedSinceLastAction($numTimeIntervals)
    {
        return $numTimeIntervals;
    }

    public function getTreasureRegeneratedSinceLastAction()
    {
        if ($this->attacked_at == '0000-00-00 00:00:00') {
            $treasureRegenerated = 0;
        } else {
            $time_since_last_action = $this->findTimeSinceLastAction();
            $numTimeIntervals = $this->findNumTimeIntervals($time_since_last_action);
            $treasureRegenerated = $this->findTreasureRegeneratedSinceLastAction($numTimeIntervals);
        }
        return $treasureRegenerated;
    }

    public function getTotalTreasure(){
        $totalTreasure = $this->getTreasureRegeneratedSinceLastAction() + $this->getTreasureAmount();
        return $totalTreasure;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ships()
    {
        return $this->hasMany('App\Ship');
    }

    public function name()
    {
        return $this->name;
    }
}
