<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Log;


class Seaport extends Model
{
    protected $attributes = [
        'name' => 'Default seaport',
        'treasure_amount' => 100,
//        'user_id' => 1,
//        'rank' => 'Cook',
//        'attributes' => 'totally average',
//        'ship_id' => 1,
    ];

//    public $attacked_at;

//    public TimeSince

    public function parseDate($date)
    {
        return Carbon::parse($date);
    }

    public function findTimeSinceLastAction(){
        Log::info('in function findTimeSinceLastAction');
        $now = Carbon::now();
//        $time_difference = $now - $this->attacked_at;
//        $totalDuration = $finishTime->diffInSeconds($startTime);
        $parsed_date = $this->parseDate($this->attacked_at);
        $totalDuration = $now->diffInSeconds($parsed_date);


        return $totalDuration;
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
