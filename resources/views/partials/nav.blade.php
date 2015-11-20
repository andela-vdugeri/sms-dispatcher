<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Latter Africa</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="navbarCollapse">
            <ul class="nav navbar-nav">
                @if(! Auth::user())
                    <li><a href="{{ route('login.page') }}"id="login-link">Login</a></li>
                    <li><a href="{{ route('register.page') }}" id="register-link">Register</a></li>
                @endif
                <li><a href="{{ route('messages.page') }}">Sms</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="#!">Contact</a></li>
                <li><a href="#!">Clients</a></li>
                @if(Auth::user())
                    <li><a href="{{ route('user.logout') }}" >Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>