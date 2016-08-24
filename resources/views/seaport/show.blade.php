@extends('seaport.form')

@section('time_since_last_action')
    <div>seaport id: {{$seaport->id}}</div>
    <div>defensive rating: {{$seaport->defensive_rating}}</div>

    <script>
        var seaport_id = "{{$seaport->id}}";
        console.log(seaport_id);
        $(document).ready(function () {
//            change to setTimeout instead of setInterval
            setTimeout("getValuesSinceLastAction(seaport_id)", 1000);
            setTimeout("getNumAttacks(seaport_id)", 1000);
        });
    </script>

    <div>time since last action:</div>
    <div id="timeSinceLastAction"></div>
    <div>total treasure:</div>
    <div id="totalTreasure"></div>

    <?php $ships_in_this_port = $seaport->ships()->get();
    $current_user_ships = array();
    $current_user_ships_include_0_attacks = array();
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

        user id from seaport: {{$seaport -> user_id}}
        user id from auth: {{Auth::user()->id}}
        <div>ships stationed here:
            <ul>
                @if($ships_in_this_port != [])
                    @foreach($ships_in_this_port as $ship_in_this_port)
                        @if($ship_in_this_port->user_id == Auth::user()->id)
                            {{--@if(true)--}}
                            <?php
                            $current_user_ships_include_0_attacks[$ship_in_this_port->id] = $ship_in_this_port->name;
                            if ($ship_in_this_port->num_attacks > 0) {
                                $current_user_ships[$ship_in_this_port->id] = $ship_in_this_port->name;
                            }
                            ?>
                            <li>* {{$ship_in_this_port->name}} (your ship)
                                hp: {{$ship_in_this_port->current_hit_points}}
                                / {{$ship_in_this_port->max_hit_points}}</li>
                            <li>num attacks left out of {{$ship_in_this_port->max_num_attacks}}:</li>
                            <li id="{{'numAttacks' . $ship_in_this_port->id}}"></li>
                        @else
                            <li>{{$ship_in_this_port->name}} (other's ship)</li>
                            <li>num attacks left:</li>
                            <li id="{{'numAttacks' . $ship_in_this_port->id}}"></li>
                        @endif
                    @endforeach
                @else
                    <div>no ships here</div>
                @endif
            </ul>
        </div>



        @if($seaport -> user_id != Auth::user()->id && $current_user_ships != [])
            {{--@if($current_user_ships != [])--}}
            {{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/attack')) }}
            {{ csrf_field() }}
            {{Form::select('ship_id', $current_user_ships)}}
            <button type="submit" class="btn btn-danger">Attack this port!</button>
            {{ Form::close() }}

        @elseif($seaport -> user_id == Auth::user()->id && $current_user_ships_include_0_attacks != [])
            {{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/deposit')) }}
            {{ csrf_field() }}
            {{Form::select('ship_id', $current_user_ships_include_0_attacks)}}
            <button type="submit" class="btn btn-success" color="green">Deposit money in
                your
                port!
            </button>
            {{ Form::close() }}


            {{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/deposit')) }}
            {{ csrf_field() }}
            {{Form::select('ship_id', $current_user_ships_include_0_attacks)}}
            <button type="submit" class="btn btn-success" color="blue">Heal your ship (placeholder actually deposits)
            </button>
            {{ Form::close() }}


        @endif
    @endif

@endsection




<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/seaport-ajax.js')}}"></script>