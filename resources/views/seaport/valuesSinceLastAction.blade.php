Seaport id: {{$seaport->id}}

<script>
    var seaport_id = "{{$seaport->id}}";
    console.log(seaport_id);
    $(document).ready(function () {
        setInterval("getValuesSinceLastAction(seaport_id)", 100);
    });
</script>

<div>time since last action:</div>
<div class="timeSinceLastAction"></div>
<div>total treasure:</div>
<div class="totalTreasure"></div>


<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/seaport-ajax.js')}}"></script>