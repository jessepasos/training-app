@extends('seaport.form')

{{--@yield('time_since_last_action')--}}
<?php  $thing = 10; ?>



@section('time_since_last_action')
    {{$seaport->id}}
    <script>

    var myvar = "<?php echo $thing; ?>";
    var seaport_id = "<?php echo $seaport->id; ?>";
    //    console.log(myvar);
    console.log(seaport_id);

    </script>

<div>time since last action: {{$time_since_last_action}}</div>
<div id = "div1">cool</div>
<div>num 15 second intervals since last action: {{$numTimeIntervals}}</div>
    <div>num gold since last action: {{$treasureRegenerated}}</div>
<div>total gold : {{$totalTreasure}}</div>
@endsection
{{--@endsection--}}


<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/ajax-crud.js')}}"></script>