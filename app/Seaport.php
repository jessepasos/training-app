<?php

namespace App;
//use App\Http\Middleware;
use Illuminate\Database\Eloquent\Model;

//namespace App\Http\Middleware;

class Seaport extends Model
{
    //
//    public $timestamps = false;

//    public $attacked_at;

    protected $fillable = [
        'name',
        'treasure_amount',
    ];

    public function __construct()
    {

//        $this->middleware('auth');


//        $this->middleware('log', ['only' => [
//            'fooAction',
//            'barAction',
//        ]]);
//
//        $this->middleware('subscribed', ['except' => [
//            'fooAction',
//            'barAction',
//        ]]);
    }

//    public function breed()
//    {
//        return $this->belongsTo('Furbook\Breed');
//    }

}
