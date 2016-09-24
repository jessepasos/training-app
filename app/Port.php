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


    public static function lastAttack()
    {

        $portsAttacked = 'No attacks yet';

        $ports = Port::all();

        $attackedAt = 0;
        foreach($ports as $port) {
            if(strtotime($port->attacked_at) > strtotime($attackedAt)) {
                $attackedAt = $port->attacked_at;
                $portsAttacked = $port->name;
            }
        }

        return $portsAttacked;
    }
}
