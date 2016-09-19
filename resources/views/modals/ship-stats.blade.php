@foreach($ships as $ship)
    <div class="modal fade" id="ship-stats-{{$ship->id}}" tabindex="-1" role="dialog" aria-labelledby="shipstats">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ship Statistics:</h4>
                </div>
                <div class="modal-body">

                    <p class="text-center"><img src="images/ship-pearl.png" alt="ship"></p>
                    <h2 class="text-center">{{$ship->name}}</h2>
                    <hr class="skull">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Captain:</small> <strong>
                                    {{$ship->captain()}}
                                </strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Level:</small> <strong>{{$ship->level}}<br>({{$ship->levelDetails->name}})</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Hull Integrity:</small> <strong>{{$ship->current_health}}/{{$ship->levelDetails->max_health}}</strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Crew members:</small> <strong>{{$ship->getCrewSize()}}/{{$ship->levelDetails->max_crew}}</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Crew Saltiness:</small> <strong>{{$ship->getCrewSalt()}}</strong></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat">
                                <p><small class="stat-label">Cannons:</small> <strong>{{$ship->current_cannons}}/{{$ship->levelDetails->max_cannons}}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div>
                         <p>Crew</p> 
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="stat">
                                    <p><small class="stat-label">First Mate:</small> <strong>
                                        {{$ship->getCrewMemberByRank(2)}}
                                    </strong></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat">
                                    <p><small class="stat-label">Second Mate:</small> <strong>
                                        {{$ship->getCrewMemberByRank(3)}}
                                    </strong></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="stat">
                                    <p><small class="stat-label">Seargant-at-Arms:</small> <strong>
                                        {{$ship->getCrewMemberByRank(4)}}
                                    </strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="stat">
                                    <p><small class="stat-label">Seaman:</small> <strong>
                                        {{$ship->getCrewMemberByRank(5)}}
                                    </strong></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat">
                                    <p><small class="stat-label">Cook:</small> <strong>
                                        {{$ship->getCrewMemberByRank(6)}}
                                    </strong></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat">
                                    <p><small class="stat-label">Other Crew:</small><strong>
                                    {{$ship->getOtherCrew()}}
                                    </strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="/ship-level-up" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$ship->id}}" >
                        <div class="text-center">                    
                            <button class="btn btn-default btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Upgrade: ${{$ship->levelDetails->cost}} </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach