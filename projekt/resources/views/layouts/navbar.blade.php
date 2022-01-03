<nav class="navbar navbar-expand-lg navbar-dark bg-main ">
    <a class="navbar-brand slideLeft" href="{{ route('posts') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item @yield('posts') slideLeft">
                <a class="nav-link" href="{{ route('posts') }}">Posty <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @yield('contact') slideLeft">
                <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
            </li>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item @yield('login') slideLeft">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item @yield('register') slideLeft">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                    </li>
                @endif
            @endguest
            @auth
                <div class="nav-item dropdown slideLeft" style="z-index: 1;">
                    <a class="nav-link @yield('profile') dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu bg-main" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="{{ route('profile') }}">Edytuj profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-white" href="{{ route('logout') }}">Wyloguj się</a>
                    </div>
                </div>
            @endauth
        </ul>
    </div>
</nav>
