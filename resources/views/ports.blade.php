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
                                <h2 class="text-uppercase">Ports:</h2>


                                @foreach ($ports as $port)
                                    <div class="col-md-12">
                                        <h4>{{ $port->name }}</h4>
                                        <div class="col-md-5 col-sm-5">
                                            <h5>Attacked At</h5>
                                            <h6>{{ $port->attacked_at }}</h6>
                                        </div>
                                        <div class="col-md-5 col-sm-5">
                                            <h5>Treasure Amount</h5>
                                            <h6>{{ $port->treasure_amount }}</h6>
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <a class="btn btn-danger pull-right" href="/datanerds/public/attack?port={{ $port->name }}" role="button">Attack</a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section>

        @include('layouts.footer')

    </div>

@endsection