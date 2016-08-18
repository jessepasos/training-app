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
                                <label for="rank" class="col-sm-2 control-label">Assigned User</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="rank" name="user_id" value="">
                                        @if($pirate -> user == '')
                                            @foreach($users as $temp_user)}}
                                            <option value="{{ $temp_user->id }}">{{ $temp_user->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach($users as $temp_user)}}
                                            @if($temp_user -> id == $pirate -> user -> id)
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
                                <label for="attributes" class="col-sm-2 control-label">Physical Attributes</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="attributes" name="attributes"
                                           value="{{ $pirate->attributes }}">
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
