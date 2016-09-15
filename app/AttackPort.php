<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttackPort extends Model
{
	protected $table = 'attackPorts';

	protected $fillable = [
        'name', 'attacked_at', 'treasure_amount'
    ];

    public $dates = [
    	'attacked_at'
    ];

    
}
