<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'attacked_at',
        'treasure_amount',
    ];


    public function port()
    {
    	return "OK";
        // return $this->hasMany(Port::class);
    }
}
