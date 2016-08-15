@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>You are about to embark on an epic journey with the crew of the Black
                            Perl. Only proceed if you think you have what it takes.</b></div>

                    <div class="panel-body">
                        <div>List of seaports</div>
                        <div><a href = "{{url('/test')}}" > Add new seaport </a></div>
                        @foreach ($seaports as $seaport)
                            <li class="list-group-item">
                                <a href="/seaport/{{ $seaport->id }}">
                                    <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    <div>name: {{ $seaport->name }} </div>
                                    <div>treasure amount: {{ $seaport -> treasure_amount }}</div>

                                    <?php
//                                    $date = new DateTime('0000-00-00 0:0:0');
//                                    $result = $date->format('Y-m-d H:i:s');
//                                        echo $result;

                                    echo 'before';

//                                    echo($seaport -> attacked_at);
//                                        echo(gettype($seaport -> attacked_at));
//                                        echo('0000-00-00 0:0:0');

                                    echo($seaport -> attacked_at == '0000-00-00 00:00:00');
                                        echo 'after';
                                    ?>


                                    <div>last attacked at: {{ $seaport -> attacked_at }}</div>
                                </a>

                                {{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/attack')) }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">Attack this port!</button>
                                {{ Form::close() }}
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
