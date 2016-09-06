@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.header')

        <section id="game">
            <div id="game-imagery">

                <img src="images/screen-create-account.jpg" alt="intro">
                <div class="rain"></div>
                <span id="step_count">Step / <span class="num">02</span></span>
     
                <div id="game-play">

                    <div id="create_account">

                        <h1 class="text-center no-m-t">The Black PERL has been at the port without a captain for some time now. Now is your chance to show the world your mettle! Commandeer the Black PERL!</h1>

                        <form action="/commandeer" method="post">
                        {{ csrf_field() }}
                            <input type="hidden" name="ship_name" value="The Black PERL">

                            <input class="form-control" type="submit"></form>
                        </form>


                    </div>

                </div>
            </div>
        </section>

        @include('layouts.footer')

    </div>

@endsection
