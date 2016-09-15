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
                                <h2 class="text-uppercase">Attack:</h2>

                                @if(Session::get('success'))
                                    <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    </div>
                                @endif

                                <hr>
                                <h4>Attackable ports</h4>
                                <div class="icon_set ports">

                                    @foreach ($attackPorts as $attackPort)
                                     <button type="button" class="inventory_item ship" data-toggle="modal" data-target="#attack-port-{{$attackPort->id}}">
                                    <img src="images/i-ship.png" class="icon">
                                    <span class="item-title">{{ $attackPort->name }}</span>
                                    </button>
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
    <!--Modal for attack page-->
    @foreach($attackPorts as $attackPort)
    <div class="modal fade" id="attack-port-{{$attackPort->id}}" tabindex="-1" role="dialog" aria-labelledby="attack-port-{{$attackPort->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Attack Port:</h4>
                </div>
                <div class="modal-body">

                    <p class="text-center"><img src="images/i-ship.png" alt="ship"></p>
                    <h2 class="text-center">{{$attackPort->name}}</h2>
                    <hr class="skull">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Last Attacked:</small> <strong>{{$attackPort->attacked_at}}</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Treasure:</small> <strong>{{$attackPort->treasure_amount}}</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Treasure restocked in:</small> <strong>Place timer here</strong></p>
                            </div>
                        </div>
                    <div>
                    
                    <form action="/attack?port={{$attackPort->name}}" method="post">
                        {!! csrf_field() !!}
                        {{-- select multiple ships to attack??  --}}
                        <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Attack this port!</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endforeach

@endsection
