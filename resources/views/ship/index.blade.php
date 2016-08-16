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
                                    <div>displacement: {{ $ship->displacement }} </div>
                                    <div>length: {{ $ship->length }} </div>
                                    <div>draft: {{ $ship->draft }} </div>
                                    <div>crew_saltiness: {{ $ship->crew_saltiness }} </div>
                                    <div>num_cannons: {{ $ship->num_cannons }} </div>
                                    <div>
                                    <?php $pirates =  $ship->pirates()->get(); ?>
                                        @foreach($pirates as $pirate)
                                            <li>{{$pirate -> name}} {{$pirate -> id}}</li>
                                        @endforeach

                                </div>

                                </a>
                            </li>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
