@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            {{--<a class="navbar-brand" href="{{ url('/seaport') }}">--}}
            {{--SEAPORT INDEX--}}
            {{--</a>--}}

            {{--{{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/attack')) }}--}}
            {{--{{ csrf_field() }}--}}
            {{--<button type="submit" class="btn btn-primary">Attack this port!</button>--}}
            {{--{{ Form::close() }}--}}

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $seaport->rank }} {{ $seaport->name }}</div>

                    <div class="panel-body">


                        <h1>Edit seaport</h1>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            {{--<div class="form-group">--}}
                                {{--<label for="name" class="col-sm-2 control-label">Name</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<input type="text" class="form-control" id="name" name="seaport_name"--}}
                                           {{--value="{{ $seaport->name }}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="treasure_amount" class="col-sm-2 control-label">treasure_amount</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<input type="text" class="form-control" id="treasure_amount"--}}
                                           {{--name="seaport_treasure_amount" value="{{ $seaport->treasure_amount }}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <?php
                            $seaport_attributes = [
                                    'name',
                                    'treasure_amount',
//                                    'length',
//                                    'draft',
//                                    'crew_saltiness',
//                                    'num_cannons'
                            ];
                            ?>

                            @foreach($seaport_attributes as $seaport_attribute)
                                <div class="form-group">
                                    <label for="{{$seaport_attribute}}"
                                           class="col-sm-2 control-label">{{$seaport_attribute}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="length"
                                               name="{{'seaport_' . $seaport_attribute}}"
                                               value="{{ $seaport->{$seaport_attribute} }}">
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <label for="rank" class="col-sm-2 control-label">Assigned User</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="rank" name="user_id" value="">
                                        @if($seaport -> user == '')
                                            @foreach($users as $temp_user)}}
                                            <option value="{{ $temp_user->id }}">{{ $temp_user->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach($users as $temp_user)}}
                                            @if($temp_user -> id == $seaport -> user -> id)
                                                <option selected="selected"
                                                        value="{{ $temp_user->id }}">{{ $temp_user->name }}</option>
                                            @else
                                                <option value="{{ $temp_user->id }}">{{ $temp_user->name }}</option>
                                            @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>


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
