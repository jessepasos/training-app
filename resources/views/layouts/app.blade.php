<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The black PERL training.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    @if (Auth::check())
    <aside id="user-bar">
        <div class="container">

            <ul>
                <li>Welcome back <strong>Jon Couch</strong>.</li>
                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Manage Account</a></li>
                <li><a href="#"><i class="fa fa-code" aria-hidden="true"></i> Progress</a></li>
                <li><a href="#"><i class="fa fa-signal" aria-hidden="true"></i> Stats</a></li>
            </ul>

        </div>
    </aside>
    @endif

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

</body>
</html>
