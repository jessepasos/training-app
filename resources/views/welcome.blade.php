@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.header')

        <section id="game">
            <div id="game-imagery">
                <img src="images/screen-intro.jpg" alt="intro">
                <div class="rain"></div>
                <div id="game-play">
                    <div id="message-area">
                        <h3>You are about to embark on an epic journey with the crew of the BLACK PERL. Only proceed if you think you have what it takes...</h3>
                        <p>This is a training application brought to you by Data Nerds. The goal is to get you up to speed with the Laravel framework.</p>
                        <hr>
                        <p>
                            <a href="register" class="btn btn-default pulse">Continue</a>
                            <a href="#" class="btn" data-toggle="modal" data-target="#myModal">I'm too scared</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.footer')

    </div>

    <!-- Don't know what this is for modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">What the?</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="images/crying-pirate.jpg" alt="pussy" class="img-circle img-thumbnail" width="130"></p>
                    <h2 class="text-center">What the HELL?</h2>
                    <p class="lead text-center">You're a damn PUSSY! - learn to code like a <em>bawse</em>.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
