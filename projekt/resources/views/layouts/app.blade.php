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

    @include('layouts.navbar')

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
