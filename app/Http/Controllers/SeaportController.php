<?php

namespace App\Http\Controllers;

use App\Seaport;
use App\User;
use Illuminate\Http\Request;

//use App\Http\Requests;

use Log;
use Carbon;

class SeaportController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seaports = Seaport::all();
        $users = User::all();
        return view('seaport.index')->withSeaports($seaports)->withUsers($users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
        {
            return view('seaport.new');
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $seaport = new Seaport();
        Log::info($request);
        $seaport->name = $request->get('seaport_name');
        $seaport->treasure_amount = $request->get('seaport_treasure_amount');
        $seaport->save();
        return redirect()->back()->with('status', 'New seaport created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seaport = Seaport::find($id);
        return view('seaport.show')->withSeaport($seaport);
    }

    /**
     * Get attacked; set treasure_amount to 0 and update created_at with current time.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAttacked($id, Request $request)
    {
        Log::info('in get attacked function');
        Log::info($request);

        $seaport = Seaport::find($id);

        $black_perl = Seaport::where('name', '=', 'Port Royal')->first();
//        Log::info(var_dump($black_perl));
        $black_perl -> treasure_amount = $black_perl -> treasure_amount + $seaport -> treasure_amount;

        $seaport->treasure_amount = 0;
        $formatted_time = Carbon\Carbon::now()->format('Y-m-d H:i:s');
        Log::info($formatted_time);
        $seaport->attacked_at = $formatted_time;

        $seaport->save();
        $black_perl->save();
        return redirect()->back()->with('status', 'Got Attacked, treasure amount reset to 0');
    }

//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info($request);
        $seaport = Seaport::find($id);
        $seaport->name = $request->get('seaport_name');
        $seaport->treasure_amount = $request->get('seaport_treasure_amount');
        $seaport->save();
        return redirect()->back()->with('status', 'Profile saved!');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
