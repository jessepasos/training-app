{{--<div class="row">--}}
    {{--<form action="/ship-crew-add" method="post">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="hidden" name="id" value="{{$ship->id}}" >--}}
        {{--<input type="number" min="1" max="{{$ship->getRemainingCapacity}}";--}}
        {{--<div class="text-center">--}}
            {{--<button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Hire Crew $50 each </button>--}}
        {{--</div>--}}
    {{--</form>--}}
    {{--<form action="/ship-cannons-add" method="post">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="hidden" name="id" value="{{$ship->id}}" >--}}
        {{--<div class="text-center">--}}
            {{--<button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Buy Cannons $100 each</button>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</div>--}}

<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="store">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ship Statistics:</h4>
            </div>
            <div class="modal-body">

                <p class="text-center"><img src="images/ship-pearl.png" alt="ship"></p>
                <h2 class="text-center">Store</h2>
                <hr class="skull">

                <form action="/ship-store" method="post">
                    {{ csrf_field() }}
                @foreach($ships as $ship)
                    <input type="hidden" name="ship_id[{{$ship->id}}]" value="{{$ship->id}}" >
                <div class="row">
                    <div class="col-sm-16">
                        <div class="stat">
                            <p>
                                <small class="ship-label">{{$ship->name}}</small>
                                    {{--crew size counter--}}
                                <small class="buy-label">
                                    Select the number of extra crew you want on this ship:
                                    @if($ship->getRemainingCapacity() > ($ship->levelDetails->max_capacity - 6))
                                        @php($max = ($ship->levelDetails->max_crew - 6))
                                    @else
                                        @php($max = $ship->getRemainingCapacity())
                                    @endif
                                    <select class="form-control" name="new_crew[{{$ship->id}}]">
                                        @for($counter = 0; $counter <= $max; $counter++)
                                            <option value="{{$counter}}" @if($counter == $ship->extra_crew) selected="selected" @endif>{{$counter}}</option>
                                        @endfor
                                    </select>
                                    Select the number of cannons on this ship:
                                    <select class="form-control" name="new_cannons[{{$ship->id}}]">
                                        @for($counter = 0; $counter <= $ship->levelDetails->max_cannons; $counter++)
                                            <option value="{{$counter}}" @if($counter == $ship->current_cannons) selected="selected" @endif>{{$counter}}</option>
                                        @endfor
                                    </select>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach




                    <div class="text-center">
                        <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i>Buy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>