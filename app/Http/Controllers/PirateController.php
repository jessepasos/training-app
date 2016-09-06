<?php

namespace App\Http\Controllers;

use App\Pirate;
use Illuminate\Http\Request;

use App\Http\Requests;

class PirateController extends Controller
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
}
