<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Seaport extends Model
{

    protected $fillable = [
        'name',
        'treasure_amount',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
