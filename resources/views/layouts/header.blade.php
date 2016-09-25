<header>
    <a href="/datanerds/public/home" class="brand"><img src="images/black-perl.png" alt="the Black PERL"></a>
    @if (Auth::guest())
        <a href="#" class="account" data-toggle="modal" data-target="#login"><i class="fa fa-ship" aria-hidden="true"></i> Login</a>
    @else
        <a href="{{ url('/logout') }}" class="account"><i class="fa fa-ship" aria-hidden="true"></i> Log out</a>
    @endif
</header>
