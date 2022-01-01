<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
    <style>
        body{
            background-color: #111010;
            font-family: "Roboto";
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            max-width: 900px;
            margin: 0 auto;
        }
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        .bg-main{
            background-color: #111010;
        }
        .bg-minor{
            background-color: #fff;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>

</head>
<body>
<div id="app" class="bg-main">
    <nav class="navbar navbar-expand-md navbar-light bg-main">

        <div class="container-fluid">
            <div class="row w-100">
                <div class="col-sm d-flex justify-content-start">
                    <a class="navbar-brand text-primary" href="{{ url('/') }}">
                        {{ config('app.name', 'Arduino Blog') }}
                    </a>

                    <a class="nav-link text-white-50" href="{{ route('posts') }}">Posty</a>
                    <a class="nav-link text-white-50" href="#">Kontakt</a>
                </div>
                <div class="col-sm d-flex justify-content-end">

                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <div class="nav-item">
                                    <a class="nav-link text-white-50" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                            @endif

                            @if (Route::has('register'))
                                <div class="nav-item">
                                    <a class="nav-link text-white-50" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            @endif

                        @else
                            <div class="nav-item">
                                <a href="{{ route('profile') }}" class="nav-link text-white-50 "> {{ Auth::user()->name }} </a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link text-white-50 ">Wyloguj się</a>
                            </div>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="">
        @yield('content')
    </main>
</div>
</body>
</html>
