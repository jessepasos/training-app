<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    //
    public function pirate()
    {
    	return $this->belongsTo(Pirate::class);
    }
}
