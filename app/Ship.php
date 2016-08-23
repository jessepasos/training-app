<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{

    protected $attributes = [
        'name' => 'Default Ship Name',
        'current_hit_points' => 10,
        'max_hit_points' => 10,
        'num_cannons' => 4,
//        'pirates' => NULL,
    ];

    public function pirates()
    {
        return $this->hasMany('App\Pirate');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function seaport()
    {
        return $this->belongsTo('App\Seaport');
    }

    public function name()
    {
        return $this->name;

    }
}
