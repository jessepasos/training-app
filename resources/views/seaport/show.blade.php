@extends('seaport.form')

{{--@yield('time_since_last_action')--}}

@section('time_since_last_action')
<div>time since last action: {{$time_since_last_action}}</div>
<div id = "div1">cool</div>
<div>num 15 second intervals since last action: {{$numTimeIntervals}}</div>
    <div>num gold since last action: {{$treasureRegenerated}}</div>
<div>total gold : {{$totalTreasure}}</div>
@endsection
{{--@endsection--}}


