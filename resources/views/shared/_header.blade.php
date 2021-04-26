
<header id="header">
    <a class="logo" href="{{ route('home') }}">WeKam TV</a>
    <nav>
        <a href="#menu">Menu</a>
    </nav>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li>
            <form class="input-group rounded" method="post" action="{{ route('search') }}">
                @csrf
                <input type="search" name="key" class="form-control rounded" placeholder="Search" aria-label="Search"
                  aria-describedby="search-addon" style="background-color: black"/>
                <button type="submit" class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </li>
        <li><a href="{{ route('home') }}">Home</a></li>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            @if(auth()->user()->roles == 1)
            <li><a href="{{ route('admin.dashboard.index') }}">Admin</a></li>
            @endif
            <li><a href="{{ route('user.index') }}">{{ Auth::user()->name }}'s profile</a></li>
            <li><a href="{{ route('video.manage') }}">Livestream Manage</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @endif
    </ul>
</nav>
