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
                                <h4>Your Ships
                                @if(Auth::user()->user_level == 1)
                                     <small><a href="#" data-toggle="modal" data-target="#createShip" class="label label-text pull-right">New Ship</a></small></h4>
                                @endif
                                </h4>

                                <div class="icon_set ships">
                                    <div class="row">
                                    @foreach ($ships as $ship)
                                        <div class="col-md-3">
                                            <button class="inventory_item ship" data-toggle="modal" data-target="#ship-stats" data-ship="{{ json_encode($ship) }}">
                                                <img src="images/ship-pearl.png" class="icon">
                                                <span class="item-title">{{ $ship->name }}</span>
                                            </button>
                                            <a href="/datanerds/public/ships?ship_id={{ $ship->id }}" class="label label-text">
                                                Edit Ship <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
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

                                <h4>Your Pirates
                                    @if(Auth::user()->user_level == 1)
                                         <small><a href="#" data-toggle="modal" data-target="#createPirate" class="label label-text pull-right">New Pirate</a></small>
                                    @endif
                                </h4>


                                <div class="icon_set ships">
                                    @if (count($pirates) == 0)
                                        <a href="#" data-toggle="modal" data-target="#createPirate">It looks like you need a crew. </a>
                                    @endif
                                    @foreach ($pirates as $pirate)

                                        @if ($loop->first)
                                            <button class="inventory_item pirates" data-toggle="modal" data-target="#pirate-stats" data-pirate="{{ json_encode($pirate) }}" data-ships="{{ json_encode($ships) }}">
                                                <img src="images/pirate-sparrow.png" class="icon">
                                                <span class="item-rank">{{ $pirate->rank }}</span>
                                                <span class="item-title">{{ $pirate->name }}</span>
                                            </button>
                                        @else
                                            <button class="inventory_item pirates" data-toggle="modal" data-target="#pirate-stats" data-pirate="{{ json_encode($pirate) }}" data-ships="{{ json_encode($ships) }}">
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
                    <h2 class="text-center" id="js_shipName">The Black Pearl</h2>
                    <hr class="skull">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Captain:</small> <strong id="js_shipCaptain">Captain Jack Sparrow</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Displacement:</small> <strong id="js_shipDisplacement">500</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Length:</small> <strong id="js_shipLength">300 ft.</strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Draft:</small> <strong id="js_shipDraft">800</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Crew Saltiness:</small id="js_shipSaltiness"> <strong>500</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label"># of Cannons:</small id="js_shipCannons"> <strong>2</strong></p>
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

                    @if(Auth::user()->funds >= 50)
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
                    @else
                    <p>
                        You don't have the funds to hire a new crew mate. You'll need $50.00 for a new crew mate.
                    </p>
                    @endif

                </div>
            </div>
        </div>
    </div>

     <!-- Manage ships -->
    <div class="modal fade" id="createShip" tabindex="-1" role="dialog" aria-labelledby="createPirate">
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


                    @if(Auth::user()->funds >= 200)
                    <form action="/datanerds/public/createShip" method="post">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ship_name">Ship Name:</label>
                                    <input type="text" class="form-control" name="ship_name" id="ship_name">
                                </div>

                                <div class="form-group">
                                    <label for="captain">Captain:</label>
                                    @if (count($pirates) == 0)
                                        You currently have no crew mates.
                                    @else
                                        <select class="form-control" name="captain">
                                        @foreach ($pirates as $pirate)
                                            @if($pirate->rank == 'Captain')
                                            <option>{{ $pirate->name }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="displacement">Displacement:</label>
                                    <input type="number" min="0" class="form-control" name="displacement" id="displacement">
                                </div>

                                <div class="form-group">
                                    <label for="length">Length (ft):</label>
                                    <input type="number" min="0" class="form-control" name="length" id="length">
                                </div>

                                <div class="form-group">
                                    <label for="draft">Draft:</label>
                                    <input type="number" min="0" class="form-control" name="draft" id="draft">
                                </div>

                                <div class="form-group">
                                    <label for="saltiness">Crew Saltiness:</label>
                                    <input type="number" min="0" class="form-control" name="saltiness" id="saltiness">
                                </div>

                                <div class="form-group">
                                    <label for="cannons">Number of Cannons:</label>
                                    <select class="form-control" name="cannons">
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
                    @else
                    <p>
                        You don't have the funds to buy a new ship. You'll need $200.00 for a ship.
                    </p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Manage pirates -->
    <div class="modal fade" id="pirate-stats" tabindex="-1" role="dialog" aria-labelledby="pirate-stats">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pirate Profile:</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="images/pirate-sparrow.png" alt="pirate"></p>
                    <h2 class="text-center" id="js_pirateManage">Manage Pirate</h2>
                    <hr class="skull">

                    @if(Auth::user()->user_level == 1)
                    <form action="/datanerds/public/managePirate" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" name="id" id="pirate_id">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="pirate_name">Pirate Name:</label>
                                    <input type="text" class="form-control" name="pirate_name" id="pirate_name">
                                </div>

                                <div class="form-group">
                                    <label for="rank">Pirate Rank:</label>
                                    <select class="form-control" name="rank" id="rank">
                                        <option>Captain</option>
                                        <option>First mate</option>
                                        <option>Second mate</option>
                                        <option>Sergeant-at-arms</option>
                                        <option>Seaman</option>
                                        <option>Cook</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ship_id">Ship Name:</label>
                                    <select class="form-control" name="ship_id" id="ship_id">
                                        @foreach ($ships as $ship)
                                        <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Update Pirate!</button>
                        </div>

                    </form>
                    @else
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="pirate_name">Pirate Name:</label> <span id="js_pirateName"></span>
                            </div>

                            <div class="form-group">
                                <label for="rank">Pirate Rank:</label> <span id="js_pirateRank"></span>
                            </div>

                            <div class="form-group">
                                <label for="ship_id">Ship Name:</label>
                                <select class="form-control" name="ship_id" id="js_shipName" disabled>
                                    <option value="NA">This pirate is not assigned to a ship.</option>
                                    @foreach ($ships as $ship)
                                    <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
