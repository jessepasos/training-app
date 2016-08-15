<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seaport extends Model
{
    //
//    public $timestamps = false;

//    public $attacked_at;

    protected $fillable = [
        'name',
        'treasure_amount',
    ];

//    public function breed()
//    {
//        return $this->belongsTo('Furbook\Breed');
//    }

}
