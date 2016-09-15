   <div class="modal fade" id="createPirate" tabindex="-1" role="dialog" aria-labelledby="createPirate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pirate Profile:</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="images/pirate-sparrow.png" alt="pirate"></p>
                    <h2 class="text-center">Create a pirate</h2>
                    <hr class="skull">

                    <form action="/new-pirate" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="saltiness" value="0" >

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="key">Pirate Name:</label>
                                    <input type="text" class="form-control" name="pirate_name" id="pirate_name">
                                </div>

                                <div class="form-group">
                                    <label for="key">Pirate Rank:</label>
                                    <select class="form-control" name="rank_id">
                                        <option value=NULL>Unassigned</option>
                                        <option value=1>Captain</option>
                                        <option value=2>First-Mate</option>
                                        <option value=3>Second-Mate</option>
                                        <option value=4>Seargeant-at-arms</option>
                                        <option value=5>Seaman</option>
                                        <option value=6>Cook</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                    <label for="key">Assign to ship:</label>
                                    <select class="form-control" name="ship_id">
                                            <option value=NULL selected="selected">Unassigned</option>
                                        @foreach($ships as $ship)
                                            <option value={{$ship->id}} @if ($ships->count() == $ship->id) @endif>{{$ship->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        <div class="text-center">
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Pirate!</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>