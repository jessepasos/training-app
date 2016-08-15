@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b> Ship Index </b></div>

                    <div class="panel-body">
                        <div>List of ships</div>
                        <div><a href="{{url('/ship-new')}}"> Add new ship </a></div>
                        @foreach ($ships as $ship)
                            <li class="list-group-item">
                                <a href="/ship/{{ $ship->id }}">
                                    <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    <div>name: {{ $ship->name }} </div>
                                    <div>treasure amount: {{ $ship -> treasure_amount }}</div>


                                    @if($ship -> attacked_at == '0000-00-00 00:00:00')
                                        <div> never attacked before</div>
                                    @else
                                        <div>last attacked at: {{ $ship -> attacked_at }}</div>
                                    @endif
                                </a>

                                @if($ship -> id != 1)
                                {{ Form::open(array('url' => '/ship/' . $ship -> id . '/attack')) }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">Attack this port!</button>
                                {{ Form::close() }}
                                    @endif

                            </li>
                        @endforeach

                    </div>

                    <div class="panel-footer">
                        {{--<div class="text-center">--}}
                        {{--<a href="/login" class="btn btn-default">Continue</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
