@include('layouts.app')

<head>
    <title>Logowanie</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
</head>

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>



<div class="container">
    <div class="row justify-content-center fadeIn">
        <div class="col-md-8">
            <div class="card rounded-0 border-0 bg-transparent">
                <div class="card-header bg-transparent text-white rounded-0 border-0">{{ __('Zaloguj się') }}</div>

                <div class="card-body bg-transparent">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="rounded-0 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-white">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="rounded-0 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Zapamiętaj mnie') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                                {{--                                <button type="submit" class="btn btn-primary">--}}
                                {{--                                    {{ __('Login') }}--}}
                                {{--                                </button>--}}

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Zapomniałeś hasła?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-sm-12 addPostBtn p-0">
                                <button type="submit" value="" class="box-shadow">
                                    <div class="row">
                                        <div class="col align-self-start"></div>
                                        <div class="col align-self-center">ZALOGUJ SIĘ</div>
                                        <div class="col align-self-end text-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="" viewBox="-80 5 100 10" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')

