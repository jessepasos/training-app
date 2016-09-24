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

                                <a href="/datanerds/public/ports" id="btn-attack"><img src="images/btn-start-attack.png" class="attack" alt="start attack"></a>

                                <div class="stat port">
                                    <img src="images/i-" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Your Home Port:</small> <strong> {{ $port->name }}</strong></p>
                                </div>
                                <div class="stat attacks">
                                    <img src="images/i-cannon.png" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Port Attacked at:</small> <strong>{{ $last_attack }}</strong></p>
                                </div>
                                <div class="stat treasure">
                                    <img src="images/i-treasure.png" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Treasure Amount:</small> <strong>${{ number_format(Auth::user()->funds, 2) }}</strong></p>
                                </div>

                            </div>
                            <div class="col-md-9 inventory">
                                <h2 class="text-uppercase">Inventory:</h2>
                                <hr>
                                <h4>Your Ships <small><a href="#" data-toggle="modal" data-target="#manageShip" class="label label-text pull-right">New Ship</a></small></h4>
                                <div class="icon_set ships">
                                    <div class="row">
                                        @foreach ($ships as $ship)
                                        <div class="col-md-4">
                                            <button class="inventory_item ship" data-toggle="modal" data-target="#ship-stats">
                                                <img src="images/ship-pearl.png" class="icon">
                                                <span class="item-title">{{ $ship->name }}</span>
                                            </button>
                                            <a href="/datanerds/public/ships?ship_id={{ $ship->id }}" class="label label-text pull-right">Edit Ship <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </div>
                                        @endforeach
                                    </div>

                                    <!--
                                    <button class="inventory_item ship" data-toggle="modal" data-target="#ship-stats">
                                        <img src="images/i-ship.png" class="icon">
                                        <span class="item-title">Queen Anne's Revenge</span>
                                    </button>
                                    -->

                                </div>

                                <h4>Your Pirates <small><a href="#" data-toggle="modal" data-target="#createPirate" class="label label-text pull-right">New Pirate</a></small></h4>

                                <div class="icon_set ships">
                                    @if (count($pirates) == 0)
                                        <a href="#" data-toggle="modal" data-target="#createPirate">It looks like you need a crew. </a>
                                    @endif
                                    @foreach ($pirates as $pirate)

                                        @if ($loop->first)
                                            <button class="inventory_item pirates" data-toggle="modal" data-target="#pirate-stats">
                                                <img src="images/pirate-sparrow.png" class="icon">
                                                <span class="item-rank">{{ $pirate->rank }}</span>
                                                <span class="item-title">{{ $pirate->name }}</span>
                                            </button>
                                        @else
                                            <button class="inventory_item pirates" data-toggle="modal" data-target="#pirate-stats">
                                                <img src="images/i-pirate.png" class="icon">
                                                <span class="item-rank">{{ $pirate->rank }}</span>
                                                <span class="item-title">{{ $pirate->name }}</span>
                                            </button>
                                        @endif

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

    <!-- Ship Stats -->
    <div class="modal fade" id="ship-stats" tabindex="-1" role="dialog" aria-labelledby="shipstats">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ship Statistics:</h4>
                </div>
                <div class="modal-body">

                    <p class="text-center"><img src="images/ship-pearl.png" alt="ship"></p>
                    <h2 class="text-center">The Black Pearl</h2>
                    <hr class="skull">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Captain:</small> <strong>Captain Jack Sparrow</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Displacement:</small> <strong>500</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Length:</small> <strong>300 ft.</strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Draft:</small> <strong>800</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Crew Saltiness:</small> <strong>500</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label"># of Cannons:</small> <strong>2</strong></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Create new pirate -->
    <div class="modal fade" id="createPirate" tabindex="-1" role="dialog" aria-labelledby="createPirate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pirate Profile:</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="images/pirate-sparrow.png" alt="pirate"></p>
                    <h2 class="text-center">Create a pirate</h2>
                    <hr class="skull">

                    <form action="/datanerds/public/createPirate" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="key">Pirate Name:</label>
                                    <input type="text" class="form-control" name="pirate_name" id="pirate_name">
                                </div>

                                <div class="form-group">
                                    <label for="key">Pirate Rank:</label>
                                    <select class="form-control" name="rank">
                                        <option>Captain</option>
                                        <option>First mate</option>
                                        <option>Second mate</option>
                                        <option>Sergeant-at-arms</option>
                                        <option>Seaman</option>
                                        <option>Cook</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Pirate!</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

     <!-- Manage ships -->
    <div class="modal fade" id="manageShip" tabindex="-1" role="dialog" aria-labelledby="createPirate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ship Profile:</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="images/ship-pearl.png" alt="ship"></p>
                    <h2 class="text-center">Ship Management</h2>
                    <hr class="skull">

                    <form action="/datanerds/public/manageShip" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="key">Ship Name:</label>
                                    <input type="text" class="form-control" name="ship_name" id="ship_name">
                                </div>

                                <div class="form-group">
                                    <label for="key">Captain:</label>
                                    @if (count($pirates) == 0)
                                        You currently have no crew mates.
                                    @else
                                        <select class="form-control" name="rank">
                                        @foreach ($pirates as $pirate)
                                            @if($pirate->rank == 'Captain')
                                            <option>{{ $pirate->name }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="key">Displacement:</label>
                                    <input type="number" min="0" class="form-control" name="displacement" id="displacement">
                                </div>

                                <div class="form-group">
                                    <label for="key">Length (ft):</label>
                                    <input type="number" min="0" class="form-control" name="feet" id="feet">
                                </div>

                                <div class="form-group">
                                    <label for="key">Draft:</label>
                                    <input type="number" min="0" class="form-control" name="draft" id="draft">
                                </div>

                                <div class="form-group">
                                    <label for="key">Crew Saltiness:</label>
                                    <input type="number" min="0" class="form-control" name="crew_saltiness" id="crew_saltiness">
                                </div>

                                <div class="form-group">
                                    <label for="key">Number of Cannons:</label>
                                    <select class="form-control" name="rank">
                                    @for($n = 0; $n <= 10; $n++)
                                        <option>{{ $n }}</option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Save Ship!</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
