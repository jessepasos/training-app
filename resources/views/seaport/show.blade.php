
@extends('layouts.app')

{{--<a class="navbar-brand" href="{{ url('/seaport') }}">--}}
    {{--SEAPORT INDEX--}}
{{--</a>--}}



@section('content')




    <div class="container">

        {{--<a class="navbar-brand" href="{{ url('/seaport') }}">--}}
            {{--SEAPORT INDEX--}}
        {{--</a>--}}

        <div class="row">

            <a class="navbar-brand" href="{{ url('/seaport') }}">
                SEAPORT INDEX
            </a>

            {{--{!! link_to_route('tickets.show', $ticket->topic, [$ticket->id]) !!}--}}

            {{--<a class="navbar-brand" href="{{ url('/seaport/' . $seaport -> id . '/attack') }}">--}}
                {{--attack this!--}}
            {{--</a>--}}

            {{--<form method="POST" action="{{ action('SeaportController@getAttacked') }}" accept-charset="UTF-8">--}}
                {{--<input name="_method" type="hidden" value="PUT">--}}

            {{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/attack')) }}
            {{ csrf_field() }}
            attack this!
            {{ Form::close() }}

            {{--{{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete')) }}--}}
            {{--<button type="submit" class="btn btn-danger btn-mini">Delete</button>--}}
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
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="seaport_name" value="{{ $seaport->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="treasure_amount" class="col-sm-2 control-label">treasure_amount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="treasure_amount" name="seaport_treasure_amount" value="{{ $seaport->treasure_amount }}">
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
