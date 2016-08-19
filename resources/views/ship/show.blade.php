@extends('ship.form')

@section('pirate_roster')
    <h2>Pirate Roster:</h2>
    @foreach($pirates as $pirate)
        <li>
            {{ Form::open(array('url' => '/pirate-remove/' . $pirate -> id )) }}
            {{ csrf_field() }}
            {{$pirate -> name}} {{$pirate -> id}}
            <button type="submit" class="btn btn-primary">Walk the plank!</button>
            {{ Form::close() }}
        </li>
    @endforeach
@endsection


@section('form_verb')
   Edit existing
@endsection

