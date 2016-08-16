@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome aboard, matey!</div>

                <div class="panel-body">
                    A message from your Captain: <b>"{{ $captains_message }}"</b>

                    <h3>The Roster</h3>

                    <ul class="list-group">
                        @foreach ($pirates as $pirate)
                        <li class="list-group-item"><a href="/pirate/{{ $pirate->id }}">
                                <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                {{ $pirate->rank }} {{ $pirate->name }}
                                ship id: {{ $pirate->ship_id }}
                            </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
