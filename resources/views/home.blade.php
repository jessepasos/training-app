@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.header')

        <section id="game">
            <div id="game-imagery">

                <div id="port-royal">
                    <img src="images/port-royal.jpg" alt="port royal" class="port-header">

                    <div class="inner-content">
                        <div class="row">

                            <div class="col-md-3 port_stats">
                                {{-- attack view --}}
                                {{-- <a href="" id="btn-attack"><img src="images/btn-start-attack.png" class="attack" alt="start attack"></a> --}}
                                {{-- attack modal --}}
                                <a id="btn-attack" data-toggle="modal" data-target="#attack"><img src="images/btn-start-attack.png" class="attack" alt="start attack"></a> 
                                <a href="home" id="btn-home">
                                <div class="stat port">
                                    <img src="images/i-ship.png" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Your Home Port:</small> <strong>{{ $port->name }}</strong></p>
                                </div>
                                </a>
                                <div class="stat attacks">
                                    <img src="images/i-cannon.png" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Port Attacked at:</small> <strong>No attacks yet</strong></p>
                                </div>
                                <div class="stat treasure">
                                    <img src="images/i-treasure.png" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Treasure Amount:</small> <strong>${{ $user->treasure }}</strong></p>
                                </div>

                            </div>
                            <div class="col-md-9 inventory">
                                <h2 class="text-uppercase">Inventory:</h2>

                                @if(Session::get('success'))
                                    <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if(Session::get('error') && Session::get('error')!= 'pirate duel')
                                    <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                    </div>
                                @endif

                                <hr>
                                <h4>Your Ships</h4>
                                <div class="icon_set ships">

                                    <button class="inventory_item ship" data-toggle="modal" data-target="#ship-new">
                                        <img src="images/i-ship.png" class="icon">
                                        <span class="item-rank">New Ship</span>
                                        <span class="item-title">$1000</span>
                                    </button>
                                    <br>

                                    @foreach ($ships as $ship)
                                    <button class="inventory_item ship" data-toggle="modal" data-target="#ship-stats-{{$ship->id}}">
                                        <img src="images/ship-pearl.png" class="icon">
                                        <span class="item-title">{{ $ship->name }}</span>
                                    </button>
                                    @endforeach


                                    <!--
                                    <button class="inventory_item ship" data-toggle="modal" data-target="#ship-stats">
                                        <img src="images/i-ship.png" class="icon">
                                        <span class="item-title">Queen Anne's Revenge</span>
                                    </button>
                                    -->

                                </div>

                                <h4>Your Pirates</h4>
                                
                                <div class="icon_set ships">
                                    <button class="inventory_item pirates" data-toggle="modal" data-target="#createPirate">
                                        <img src="images/i-pirate.png" class="icon">
                                        <span class="item-rank">New Recruit</span>
                                        <span class="item-title">$500</span>
                                    </button>

                                    @foreach ($pirates->where('ship_id', 'NULL') as $pirate)
                                            <button class="inventory_item pirates" data-toggle="modal" data-target="#pirate-stats-{{$pirate->id}}">
                                                <img src="images/pirate-sparrow.png" class="icon">                                              
                                                <span class="item-rank">{{ $pirate->getRankName() }}</span>
                                                <span class="item-title">{{ $pirate->name }}</span>
                                            </button>
                                    @endforeach

                                    @foreach($ships as $ship)
                                        <p><strong>{{$ship->name}}</strong></p>
                                        @foreach ($ship->crew as $pirate)
                                            <button class="inventory_item pirates" data-toggle="modal" data-target="#pirate-stats-{{$pirate->id}}">
                                                <img src="images/pirate-sparrow.png" class="icon">                                              
                                                <span class="item-rank">{{ $pirate->getRankName() }}</span>
                                                <span class="item-title">{{ $pirate->name }}</span>
                                            </button>
                                        @endforeach
                                    @endforeach


                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section>

        @include('layouts.footer')

    </div>
    {{-- Create new ship --}}
    @include('modals.ship-new')
    {{-- Ship stats --}}
    @include('modals.ship-stats')
    {{-- Create new pirate --}}
    @include('modals.pirate-new')
    {{-- Edit pirate --}}
    @include('modals.pirate-stats')
    {{-- pirate's duel for rank. Compares saltiness(XP), if both are the same, uses first pirate for rank. --}}
    @include('modals.pirate-duel')
    {{-- modal for the available attack options. --}}
    @include('modals.attack')
@endsection
