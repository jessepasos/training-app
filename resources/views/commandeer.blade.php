@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.header')

        <section id="game">
            <div id="game-imagery">

                <img src="images/screen-commandeer.jpg" alt="intro">
                <div class="rain"></div>
                <span id="step_count">Step / <span class="num">02</span></span>
     
                <div id="game-play">

                    <div id="create_account">

                    <h1 class="text-center no-m-t">Take the ship</h1>

                        <form>
                            {{ csrf_field() }}

                            <input type="hidden" name="ship_name" value="The Black Perl">

                            <div class="form-group">
                                <p>The Black Perl has been at the port without a captain for some time now. It's up to you to commandeer the ship, and assemble a crew.</p>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default pulse">
                                    <i class="fa fa-btn fa-ship"></i> Commandeer the Black Perl
                                </button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </section>

        @include('layouts.footer')

    </div>

@endsection
