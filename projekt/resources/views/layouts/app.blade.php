<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pagetitle')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    @yield('scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('font-awesome.css') }}">


</head>
<body>
@yield('background')
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-main ">
        <a class="navbar-brand slideLeft" href="{{ route('posts') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item active slideLeft">
                    <a class="nav-link" href="{{ route('posts') }}">Posty <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item slideLeft">
                    <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item slideLeft">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item slideLeft">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                        </li>
                    @endif
                @endguest
                @auth
                    <div class="nav-item dropdown slideLeft" style="z-index: 1;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu bg-main" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item drop text-white" href="#">Twoje posty</a>
                            <a class="dropdown-item text-white" href="{{ route('profile') }}">Twój profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-white" href="{{ route('logout') }}">Wyloguj się</a>
                        </div>
                    </div>
                @endauth
            </ul>
        </div>
    </nav>

    @if ($errors->any())
        <div class="text-center bg-main p-3">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li class="h3 text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="text-center bg-main p-3">
            <ul class="list-unstyled">
                <li class="h3 text-success">{!! Session::get('msg') !!}</li>
            </ul>
        </div>
    @endif
    <main>
        @yield('content')
    </main>
</div>
@include('layouts.footer')
</body>
</html>
