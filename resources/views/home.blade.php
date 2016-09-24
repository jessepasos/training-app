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

                                <a href="#" id="btn-attack"><img src="images/btn-start-attack.png" class="attack" alt="start attack"></a>

                                <div class="stat port">
                                    <img src="images/i-" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Your Home Port:</small> <strong> {{ $port->name }}</strong></p>
                                </div>
                                <div class="stat attacks">
                                    <img src="images/i-cannon.png" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Port Attacked at:</small> <strong>No attacks yet</strong></p>
                                </div>
                                <div class="stat treasure">
                                    <img src="images/i-treasure.png" alt="icon" class="stat-icon">
                                    <p><small class="stat-label">Treasure Amount:</small> <strong>$1,000</strong></p>
                                </div>

                            </div>
                            <div class="col-md-9 inventory">
                                <h2 class="text-uppercase">Inventory:</h2>
                                <hr>
                                <h4>Your Ships</h4>
                                <div class="icon_set ships">

                                    @foreach ($ships as $ship)
                                    <button class="inventory_item ship" data-toggle="modal" data-target="#ship-stats">
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
                                    @if (count($pirates) == 0)
                                        <a href="#" data-toggle="modal" data-target="#createPirate">It looks like you need a crew. </a>
                                    @else
                                        <p>
                                            <a href="#" data-toggle="modal" data-target="#createPirate">Create new pirate. </a>
                                        </p>
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

@endsection
