<?php

namespace App\Http\Controllers;

use App\Pirate;
use App\Ship;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function commandeer()
    {
        return view('commandeer');
    }
}
