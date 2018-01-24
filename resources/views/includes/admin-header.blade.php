<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-uppercase" href="{{ route('contacts.index') }}">My contact</a>
        </div>
        
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li {{ Request::is('home') ? 'class=active' : '' }}><a href="{{ route('home') }}">Home</a></li>
                <li {{ Request::is('contacts') ? 'class=active' : '' }}><a href="{{ route('contacts.index') }}">Contacts</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
                </ul>
            <form class="navbar-form navbar-right" action="{{ route('contacts.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ Request::get('term') }}" name="term" id="term" placeholder="Search...">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>