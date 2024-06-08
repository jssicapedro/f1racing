<header>
    <nav class="menu">
        <a href="{{ asset('/') }}" class="logo"><img src="{{ asset('img/F1Racing/Logo.png') }}" alt="F1Racing"></a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{ asset('/calendar') }}">Calendar</a></li>
            <li class="nav-item"><a href="{{ asset('/drivers') }}">Drivers</a></li>
            <li class="nav-item"><a href="{{ asset('/teams') }}">Teams</a></li>
            <li class="nav-item"><a href="{{ asset('/prix') }}">Prix</a></li>
            @auth
            <div class="dropdown ms-auto">
                <li class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Olá, {{ Auth::user()->name }}
                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="{{ asset('perfil') }}">Perfil</a>
                    </li>
                    @if(Auth::user())
                    <li>
                        <a class="dropdown-item" href="{{ asset('dashboardBO') }}">Administração</a>
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
            @endauth
        </ul>
    </nav>
</header>