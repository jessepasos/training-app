@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $pirate->rank }} {{ $pirate->name }}</div>

                    <div class="panel-body">
                        A message from your Captain: <b>"{{ $captains_message }}"</b>

                        <h1>Edit Pirate</h1>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Has this pirate been assigned a ship?:
                        {{--//{{property_exists($pirate, 'ship') ? 'true' : 'false'}}--}}
                        {{$pirate->ship != '' ? 'yes' : 'no'}}

                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="pirate_name"
                                           value="{{ $pirate->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rank" class="col-sm-2 control-label">Rank</label>
                                <div class="col-sm-10">
                                    {{--Create dropdown here--}}
                                    <select class="form-control" id="rank" name="rank" value="{{ $pirate->rank }}">
                                        <?php
                                        $rank_names = ['Captain', 'First mate', 'Boatswain', 'Second mate', 'Sergeant-at-arms', 'Seaman', 'Cook',];
                                        ?>

                                        @foreach($rank_names as $rank_name)
                                            @if($rank_name == $pirate->rank)
                                                <option selected="selected"
                                                        value="{{ $rank_name }}">{{ $rank_name }}</option>
                                            @else
                                                <option value="{{ $rank_name }}">{{ $rank_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="rank" class="col-sm-2 control-label">Assigned Ship</label>
                                <div class="col-sm-10">
                                    {{--Create dropdown here--}}
                                    {{--<select class="form-control" id="rank" name="ship_id" value="">--}}
                                        {{--@if($pirate->ship != '')--}}
                                            {{--@foreach($ships as $temp_ship)}}--}}
                                            {{--@if($temp_ship -> id == $pirate -> ship -> id)--}}
                                                {{--<option selected="selected"--}}
                                                        {{--value="{{ $temp_ship->id }}">{{ $temp_ship->name }}</option>--}}
                                            {{--@else--}}
                                                {{--<option value="{{ $temp_ship->id }}">{{ $temp_ship->name }}</option>--}}
                                            {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--@else--}}
                                            {{--@foreach($ships as $temp_ship)}}--}}
{{--                                            @if($temp_ship -> id == $pirate -> ship -> id)--}}
                                                {{--<option selected="selected"--}}
                                                        {{--value="{{ $temp_ship->id }}">{{ $temp_ship->name }}</option>--}}
                                            {{--@else--}}
                                                {{--<option value="{{ $temp_ship->id }}">{{ $temp_ship->name }}</option>--}}
                                            {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}
                                    {{--</select>--}}
                                    <select class="form-control" id="rank" name="ship_id" value="">
                                        @if($pirate -> ship == '')
                                            @foreach($ships as $temp_ship)}}
                                            <option value="{{ $temp_ship->id }}">{{ $temp_ship->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach($ships as $temp_ship)}}
                                                @if($temp_ship -> id == $pirate -> ship -> id)
                                                    <option selected="selected"
                                                    value="{{ $temp_ship->id }}">{{ $temp_ship->name }}</option>
                                                @else
                                                    <option value="{{ $temp_ship->id }}">{{ $temp_ship->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="attributes" class="col-sm-2 control-label">Physical Attributes</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="attributes" name="attributes"
                                           value="{{ $pirate->attributes }}">
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                            {{--<label for="attributes" class="col-sm-2 control-label">Ship ID</label>--}}
                            {{--<div class="col-sm-10">--}}
                            {{--@if($pirate -> ship_id != NULL)--}}
                            {{--<input type="text" class="form-control" id="ship_id" name="ship_id" value="{{ $pirate->ship_id }}">--}}
                            {{--@else--}}
                            {{--<input type="text" class="form-control" id="ship_id" name="ship_id" value="1">--}}
                            {{--@endif--}}


                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
