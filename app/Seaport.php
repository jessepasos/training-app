<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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
