<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The black PERL training application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/scripts.js"></script>
</head>
<body>

    @if (Auth::check())
    <aside id="user-bar">
        <div class="container">

            <ul>
                <li>Welcome back, <strong>{{ Auth::user()->name }}</strong>.</li>
                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Manage Account</a></li>
                <li><a href="#"><i class="fa fa-circle text-gold" aria-hidden="true"></i> Your Treasure <span class="badge">${{ Auth::user()->treasure }}</span></a></li>
                <li><a href="#"><i class="fa fa-ship text-gold" aria-hidden="true"></i> Your Ships <span class="badge">{{ count($ships) }}</span></a></li>
                <li><a href="#"><i class="fa fa-user text-gold" aria-hidden="true"></i> Your Pirates <span class="badge">{{ count($pirates) }}</span></a></li>
            </ul>

        </div>
    </aside>
    @endif

    @yield('content')

    <!-- Login Form -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><img src="images/skull.png" alt="skull"></p>
                    <h2 class="text-center">Aarg! - Login Pirates!</h2>
                    <p class="lead text-center">Please login to your account below.</p>

                    <form role="form" method="POST" action="{{ url('/login') }}" id="loginForm">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
        
</body>
</html>
