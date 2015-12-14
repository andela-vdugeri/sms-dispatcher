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
                <li><a href="{{ route('list.users') }}">Users</a></li>
                <li><a href="{{ route('user.payments') }}">Confirm Payment</a></li>
                <li><a href="{{ route('admin.pricing') }}">Settings</a></li>
                <li><a href="#!">Clients</a></li>
                <li><a href="{{ route('user.logout') }}" >Logout</a></li>
            </ul>
        </div>
    </div>
</nav>