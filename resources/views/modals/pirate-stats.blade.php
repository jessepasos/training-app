@foreach($pirates as $pirate)
    <div class="modal fade" id="pirate-stats-{{$pirate->id}}" tabindex="-1" role="dialog" aria-labelledby="pirate-stats">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pirate Profile:</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="images/pirate-sparrow.png" alt="pirate"></p>
                    <h2 class="text-center">{{$pirate->name}}</h2>
                    <hr class="skull">

                    <form action="/update-pirate" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="pirate_id" value="{{$pirate->id}}" >

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="key">Pirate Name:</label>
                                    <input type="text" class="form-control" name="pirate_name" id="pirate_name" value ="{{$pirate->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="key">Pirate Rank:</label>
                                    <select class="form-control" name="rank_id">
                                        <option value=NULL @if ($pirate->rank_id == NULL) selected="selected" @endif>Unassigned</option>
                                        <option value=1 @if ($pirate->rank_id == 1) selected="selected" @endif>Captain</option>
                                        <option value=2 @if ($pirate->rank_id == 2) selected="selected" @endif>First-Mate</option>
                                        <option value=3 @if ($pirate->rank_id == 3) selected="selected" @endif>Second-Mate</option>
                                        <option value=4 @if ($pirate->rank_id == 4) selected="selected" @endif>Seargeant-at-arms</option>
                                        <option value=5 @if ($pirate->rank_id == 5) selected="selected" @endif>Seaman</option>
                                        <option value=6 @if ($pirate->rank_id == 6) selected="selected" @endif>Cook</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="key">Assign to ship:</label>
                                    <select class="form-control" name="ship_id">
                                        @foreach($ships as $ship)
                                            <option value={{$ship->id}} @if ($pirate->ship_id == $ship->id) selected="selected" @endif>{{$ship->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Update Pirate!</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach