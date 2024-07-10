<header>
    <nav class="menu">
        <a href="{{ asset('/') }}" class="logo"><img src="{{ asset('img/F1Racing/Logo.png') }}" alt="F1Racing"></a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{ asset('/calendar') }}">Calendar</a></li>
            <li class="nav-item"><a href="{{ asset('/drivers') }}">Drivers</a></li>
            <li class="nav-item"><a href="{{ asset('/teams') }}">Teams</a></li>
            <li class="nav-item"><a href="{{ asset('/prix') }}">Prix</a></li>
            @auth
            <li class="nav-item"><a href="{{ asset('/results') }}">Results</a></li>
            <div class="dropdown ms-auto">
                <li class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Olá, {{ Auth::user()->name }}
                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if(Auth::user()->isAdmin)
                    <li>
                        <a class="dropdown-item" href="{{ asset('/wp-admin/dash') }}">Administração</a>
                    </li>
                    @endif
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <li class="nav-item ms-auto">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            @endauth
        </ul>
    </nav>
</header>
