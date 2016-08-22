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


    public function parseDate($date)
    {
        return Carbon::parse($date);
    }

    public function findTimeSinceLastAction()
    {
//        Log::info('in function findTimeSinceLastAction');
        $now = Carbon::now();
//        Log::info($this->attacked_at == '0000-00-00 00:00:00');
        $parsedDate = $this->parseDate($this->attacked_at);
//        Log::info($parsedDate);
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
//            if ($treasureRegenerated > 4242791145) {
//                $treasureRegenerated = 0;
//            }
        }

        return $treasureRegenerated;

    }


    protected $fillable = [
        'name',
        'treasure_amount',
    ];

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
