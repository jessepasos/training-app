<?php

namespace App\Http\Controllers;

use App\Seaport;
use Illuminate\Http\Request;

use App\Http\Requests;

use Log;

class SeaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seaports = Seaport::all();
        return view('seaport.index')->withSeaports($seaports);
    }


//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//


    public function store($id, Request $request)
    {

        Log::info($request);
        $seaport = Seaport::find($id);

        $seaport->name = $request->get('seaport_name');
        $seaport->treasure_amount = $request->get('seaport_treasure_amount');
//        $seaport->attributes = $request->get('attributes');
//        $seaport->rank = $request->get('rank');

        $seaport->save();

        return redirect()->back()->with('status', 'Profile saved!');
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
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
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
