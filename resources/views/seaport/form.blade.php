@extends('layouts.app')





@section('content')
    <div class="container">
        <div class="row">

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

                        @yield('time_since_last_action')

                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}

                            <?php
                            $seaport_attributes = [
                                    'name',
                                    'treasure_amount',
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
