<ul class="navbar-nav navbar-sidenav">
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link {{ request()->route()->named('admin.dashboard.*') ? 'active' : '' }}" href="{{ route('admin.dashboard.index') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Users">
        <a class="nav-link {{ request()->route()->named('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Users</span>
        </a>
    </li>
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Users">
        <a class="nav-link {{ request()->route()->named('admin.videos.*') ? 'active' : '' }}" href="{{ route('admin.videos.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Videos</span>
        </a>
    </li>
</ul>
