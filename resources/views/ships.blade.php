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
                                <h2 class="text-uppercase">Manage Ship:</h2>


                                <form action="/datanerds/public/manageShip" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-sm-12">

                                            <input type="hidden" class="form-control" name="id" id="id" value="{{ $ship->id }}">

                                            @if(Auth::user()->user_level == 1)
                                            <div class="form-group">
                                                <label for="ship_name">Ship Name:</label>
                                                <input type="text" class="form-control" name="ship_name" id="ship_name" value="{{ $ship->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ship_name">Rank:</label>
                                                <input type="number" min="1" max="99" class="form-control" name="ship_rank" id="ship_rank" value="{{ $ship->rank }}">
                                            </div>


                                            @endif

                                            <div class="form-group">
                                                <label for="captain">Captain:</label>
                                                @if (count($pirates) == 0)
                                                    You currently have no crew mates.
                                                @else
                                                    <select class="form-control" name="captain">
                                                    @foreach ($pirates as $pirate)
                                                        @if($pirate->rank == 'Captain')
                                                            {{ $selected = '' }}
                                                            @if($pirate->id == $ship->captain)
                                                                {{ $selected = 'selected' }}
                                                            @endif
                                                            <option {{ $selected }}>{{ $pirate->name }}</option>
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                @endif

                                            </div>

                                            <div class="form-group">
                                                <label for="displacement">Displacement:</label>
                                                <input type="number" min="0" class="form-control" name="displacement" id="displacement" value="{{ $ship->displacement }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="length">Length (ft):</label>
                                                <input type="number" min="0" class="form-control" name="length" id="length" value="{{ $ship->length }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="draft">Draft:</label>
                                                <input type="number" min="0" class="form-control" name="draft" id="draft" value="{{ $ship->draft }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="saltiness">Crew Saltiness:</label>
                                                <input type="number" min="0" class="form-control" name="saltiness" id="saltiness"  value="{{ $ship->saltiness }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="cannons">Number of Cannons:</label>
                                                <select class="form-control" name="cannons">
                                                @for($n = 0; $n <= 10; $n++)
                                                    {{ $selected = '' }}
                                                    @if($n == $ship->cannons)
                                                        {{ $selected = 'selected' }}
                                                    @endif
                                                    <option {{ $selected }}>{{ $n }}</option>
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

            </div>
        </section>

        @include('layouts.footer')

    </div>

@endsection