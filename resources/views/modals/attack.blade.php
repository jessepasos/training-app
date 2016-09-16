
{{-- WARNING! --}}
{{-- This is that attack Modal page that is connected to home.blade.php --}}
{{-- There is also attack.blade.php view. Ensure you're on the right page. --}}

    <div class="modal fade" id="attack" tabindex="-1" role="dialog" aria-labelledby="attack">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Attack Planning:</h4>
                </div>
                <div class="modal-body">

                    <p class="text-center"><img src="images/ship-pearl.png" alt="ship"></p>
                    <h2 class="text-center">Time to be a pirate, you salty sea dog! Attack something!</h2>
                    <hr class="skull">

                    <p class = "text-center"><strong>Select the target port:</strong></p>
                    <form action="/attack" method="post">
                        {{ csrf_field() }}

                        @foreach($attackPorts as $rowCounter=>$attackPort)
                        	@if($rowCounter%3 == 0)
		                    	<div class="row">
	                   		@endif

                                <div class="col-sm-4">
                                    <div class="stat">
                                        <input type="radio" name="port" value={{$attackPort->id}}>
                                        <p><small class="stat-label">{{$attackPort->name}}</small> <strong>{{$attackPort->treasure_amount}}</strong></p>
                                    </div>
                                </div>
	                        @if((++$rowCounter)%3 == 0 || $rowCounter == $attackPorts->count())
                        		</div>
                    		@endif
                        @endforeach

                        <p class = "text-center"><strong>Select the ships you want to attack:</strong></p>

                        @foreach($ships as $rowCounter=>$ship)
                            @if($rowCounter%3 == 0)
                                <div class="row">
                            @endif
                                <div class="col-sm-4">
                                    <div class="stat">
                                        <input type="checkbox" name="ships[{{$rowCounter}}]" value={{$ship->id}}>
                                        <p><small class="stat-label">{{$ship->name}}</small> <strong>attack Power:XXX</strong></p>
                                    </div>
                                </div>
                            @if((++$rowCounter)%3 == 0 || $rowCounter == $ships->count())
                                </div>
                            @endif
                        @endforeach

	                    {{-- time til return = distance*2/speed --}} 
                        <div class="text-center">                    
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i>Set Sail!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>