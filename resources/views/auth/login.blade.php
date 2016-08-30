@extends('layouts.app')

@section('content')
    <div class="container">

        @include('layouts.header')

        <section id="game">
            <div id="game-imagery">

                <div class="row">

                    <div class="col-md-6 col-md-offset-3 top-fix">

                        <p class="text-center"><img src="images/skull.png" alt="skull"></p>
                        <h2 class="text-center">Aarg! - Login Pirates!</h2>
                        <p class="lead text-center">Please login to your account below.</p>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" id="loginForm">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section>

        @include('layouts.footer')

    </div>

@endsection
