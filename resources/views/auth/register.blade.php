@extends('layouts.app')

@section('content')

    <div class="container">

        @include('layouts.header')

        <section id="game">
            <div id="game-imagery">

                <img src="images/screen-create-account.jpg" alt="intro">
                <div class="rain"></div>
                <span id="step_count">Step / <span class="num">01</span></span>

                <div id="game-play">

                    <div id="create_account">

                        <h2 class="text-center no-m-t">Create your account</h2>

                        <form role="form" method="POST" action="{{ url('/register') }}" id="registerForm">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">E-Mail Address</label>
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Create Password">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="sr-only">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default pulse">
                                    <i class="fa fa-btn fa-user"></i> Register
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
