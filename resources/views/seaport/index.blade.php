@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div><b>Explore all the seaports!</b></div>
                        <div>
                            <a href="{{url('/seaport-new')}}">
                            <span class="glyphicon glyphicon glyphicon-pencil"
                                  aria-hidden="true" >
                            </span> Add new seaport
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">

                        @foreach ($seaports as $seaport)
                            <li class="list-group-item">

                                <div>name: {{ $seaport->name }} </div>
                                <div>treasure amount: {{ $seaport -> treasure_amount }}</div>
                                <div>user owner: {{$seaport->user['name']}}</div>

                                @if($seaport -> attacked_at == '0000-00-00 00:00:00')
                                    <div> never attacked before</div>
                                @else
                                    <div>last attacked at: {{ $seaport -> attacked_at }}</div>
                                @endif


                                <?php $ships_in_this_port = $seaport->ships()->get();
                                //                                $user_ships_in_this_port = $seaport->ships()->where('user_id', '=', Auth::user()->id);
                                $current_user_ships = array();
                                ?>


                                @if(Auth::guard('admin')->user())
                                    <div>ships stationed here:
                                        <ul>
                                            @if($ships_in_this_port != [])
                                                @foreach($ships_in_this_port as $ship_in_this_port)
                                                    <li> {{$ship_in_this_port->name}} </li>
                                                @endforeach
                                            @else
                                                <div>no ships here</div>
                                            @endif
                                        </ul>
                                    </div>
                                @endif

                                @if(Auth::guard('user')->user())
                                    <div>ships stationed here:
                                        <ul>
                                            @if($ships_in_this_port != [])
                                                @foreach($ships_in_this_port as $ship_in_this_port)
                                                    @if($ship_in_this_port->user_id == Auth::user()->id)
                                                        <?php $current_user_ships[$ship_in_this_port->id] = $ship_in_this_port->name; ?>
                                                        <li>* {{$ship_in_this_port->name}} (your ship)</li>
                                                    @else
                                                        <li>{{$ship_in_this_port->name}} (other's ship)</li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div>no ships here</div>
                                            @endif
                                        </ul>
                                    </div>

                                    @if($current_user_ships != [])
                                        @if($seaport -> user_id != Auth::user()->id)
                                            {{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/attack')) }}
                                            {{ csrf_field() }}
                                            {{Form::select('ship_id', $current_user_ships)}}
                                            <button type="submit" class="btn btn-danger">Attack this port!</button>
                                            {{ Form::close() }}

                                        @else
                                            {{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/deposit')) }}
                                            {{ csrf_field() }}

                                            {{Form::select('ship_id', $current_user_ships)}}
                                            <button type="submit" class="btn btn-success" color="green">Deposit money in
                                                your
                                                port!
                                            </button>
                                            {{ Form::close() }}
                                        @endif
                                    @endif
                                @endif
                                <a href="/seaport/{{ $seaport->id }}">
                                    <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                                    seaport
                                </a>
                            </li>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
