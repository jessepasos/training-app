@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>You are about to embark on an epic journey with the crew of the Black Perl. Only proceed if you think you have what it takes.</b></div>

                    <div class="panel-body">
                        {{--<div class="text-center">--}}
                            {{--<img src="images/the-black-perl.png" />--}}
                        {{--</div>--}}
                        List of seaports

                        {{--@foreach($seaports as $seaport)'--}}
                        @foreach ($seaports as $pirate)
                            <li class="list-group-item"><a href="/pirate/{{ $pirate->id }}">
                                    <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    {{ $pirate->rank }} {{ $pirate->name }}
                                </a></li>
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
