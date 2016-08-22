@extends('seaport.form')

{{--@yield('time_since_last_action')--}}

@section('time_since_last_action')
<div>time since last action: {{$time_since_last_action}}</div>

<div>num 15 second intervals since last action: {{$numTimeIntervals}}</div>
@endsection
{{--@endsection--}}