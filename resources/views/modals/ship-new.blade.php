<div class="modal fade" id="ship-new" tabindex="-1" role="dialog" aria-labelledby="ship-new">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ship Profile:</h4>
                </div>
                <div class="modal-body">

                    <p class="text-center"><img src="images/ship-pearl.png" alt="ship"></p>
                    <h2 class="text-center">Purchase a new ship</h2>
                    <hr class="skull">
                    <form action="/ship-new" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="level" value="1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="key">Ship Name:</label>
                                    <input type="text" class="form-control" name="ship_name" id="ship_name">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Ship!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>