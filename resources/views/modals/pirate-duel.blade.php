    <div class="modal fade" id="rankDuel" tabindex="-1" role="dialog" aria-labelledby="rankDuel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pirate Duel:</h4>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Only the pirate worth his salt can take the rank!</h2>
                    <hr class="skull">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    After a vicious duel. One pirate takes the ranks, the other will be mopping the deck with the rest of the lowly crew.
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-default btn-block" data-dismiss='modal'><i class="fa fa-plus-circle" aria-hidden="true"></i>Yarrr!</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
            @if( Session::get('error') == 'pirate duel')
                <script>
                    $(function() {
                    $('#rankDuel').modal('show');
                });
                </script>
            @endif