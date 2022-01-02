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


</head>
<body>
@yield('background')
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-main">
        <div class="container-fluid">
            <div class="row w-100">
                <div class="col-sm d-flex justify-content-start">
                    <a class="navbar-brand text-primary slideLeft" href="{{ url('/') }}">
                        {{ config('app.name', 'FORUM') }}
                    </a>

                    <a class="nav-link text-white-50 slideLeft" href="{{ route('posts') }}">Posty</a>
                    <a class="nav-link text-white-50 slideLeft" href="{{ route('contact') }}">Kontakt</a>
                </div>
                <div class="col-sm d-flex justify-content-end">

                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <div class="nav-item slideRight">
                                    <a class="nav-link text-white-50" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                                </div>
                            @endif

                            @if (Route::has('register'))
                                <div class="nav-item slideRight">
                                    <a class="nav-link text-white-50" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                                </div>
                            @endif

                        @else
                            <div class="nav-item slideRight">
                                <a href="{{ route('profile') }}" class="nav-link text-white-50 "> {{ Auth::user()->name }} </a>
                            </div>
                            <div class="nav-item slideRight">
                                <a href="{{ route('logout') }}" class="nav-link text-white-50 ">Wyloguj się</a>
                            </div>

                        @endguest
                    </div>
                </div>
            </div>
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
