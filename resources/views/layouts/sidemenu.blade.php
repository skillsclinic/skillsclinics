<ul class="sidebar navbar-nav toggled">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tutee</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('tutee.index') }}">View All</a>
            <a class="dropdown-item" href="{{ route('tutee.create') }}">Create</a>
            {{--<div class="dropdown-divider"></div>--}}
            {{--<h6 class="dropdown-header">Other Pages:</h6>--}}
            {{--<a class="dropdown-item" href="404.html">404 Page</a>--}}
            {{--<a class="dropdown-item" href="blank.html">Blank Page</a>--}}
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('users.index') }}">View All</a>
            <a class="dropdown-item" href="{{ route('users.create') }}">Create</a>
            <a class="dropdown-item" href="{{ route('register') }}">Register</a>

        </div>
    </li>


    {{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="tables.html">--}}
    {{--<i class="fas fa-fw fa-table"></i>--}}
    {{--<span>Tables</span></a>--}}
    {{--</li>--}}
</ul>