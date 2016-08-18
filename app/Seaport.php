<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Seaport extends Model
{

//    public function __construct()
//    {
////        $this->middleware('web');
////        $this->middleware('auth');
////        $this->user = User::all();
//
//    }



    protected $fillable = [
        'name',
        'treasure_amount',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
