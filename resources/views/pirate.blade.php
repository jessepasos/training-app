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
                                    <input type="text" class="form-control" id="name" name="pirate_name" value="{{ $pirate->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rank" class="col-sm-2 control-label">Rank</label>
                                <div class="col-sm-10">
                                    {{--Create dropdown here--}}
                                    <div class="col-sm-3">
                                        <select class="form-control" id="rank" name="rank" value="{{ $pirate->rank }}">
                                            {{--@for($i = date('Y'); $i <= date('Y') +  10; $i++)--}}
                                                {{--<option value="{{ $i }}">{{ $i }}</option>--}}
                                            {{--@endfor--}}





                                            <option value = "Captain">Captain</option>
                                            <option value = "First mate">First mate</option>
                                            <option value = "Captain">Captain</option>
                                            <option value = "Captain">Captain</option>
                                            <option value = "Captain">Captain</option>
                                            <option value = "Captain">Captain</option>
                                        </select>
                                    </div>

                                    {{--<input type="text" class="form-control" id="rank" name="rank" value="{{ $pirate->rank }}">--}}

                                    {{--<div class="dropdown open" value="{{ $pirate->rank }}">--}}
                                        {{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="{{ $pirate->rank }}">--}}
                                            {{--Dropdown button--}}
                                        {{--</button>--}}
                                        {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" value="{{ $pirate->rank }}">--}}
                                            {{--<a class="dropdown-item" href="#">Action</a>--}}
                                            {{--<a class="dropdown-item" href="#">Another action</a>--}}
                                            {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="dropdown">--}}
                                        {{--<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown", value="{{ $pirate->rank }}">Dropdown Example--}}
                                            {{--<span class="caret"></span></button>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="#">HTML</a></li>--}}
                                            {{--<li><a href="#">CSS</a></li>--}}
                                            {{--<li><a href="#">JavaScript</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="attributes" class="col-sm-2 control-label">Physical Attributes</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="attributes" name="attributes" value="{{ $pirate->attributes }}">
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
