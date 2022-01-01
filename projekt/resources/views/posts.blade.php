@include('layouts.app')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Posty</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
</head>
<body>
    <div class="table-container">
        <div class="title p-2 bg-main text-white">
            <h1>Posty użytkowników</h1>
        </div>
        @auth
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9 addPostBtn p-0">
                    <button type="submit" value="" class="box-shadow" onclick="window.location='{{ route('create') }}'">
                        <div class="row">
                            <div class="col align-self-start"></div>
                            <div class="col align-self-center">DODAJ POST</div>
                            <div class="col align-self-end text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" viewBox="-80 5 100 10" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

        @endauth

        @guest
            <div class="table-container text-center mt-3">
                <b class="text-muted">Zaloguj się aby dodawać posty.</b>
                <br>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-9 addPostBtn p-0">
                        <button type="submit" value="" class="box-shadow" onclick="window.location='{{ route('login') }}'">
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
            </div>
        @endguest

        <div class="row d-flex justify-content-center mt-5">
            @foreach($posts as $post)
                <div class="card rounded-0 bg-minor p-0 w-75 m-3 box-shadow">
                    <div class="card-body">
                        <h4 class="card-title ">{{$post->title}}</h4>
                        <p class="card-text p-3">{{$post->message}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row p-1">
                            @auth
                                @if($post->user_id == Auth::user()->id)
                                    <div class="col-1"><a href="{{ route('delete', $post->id) }}" class="btn btn-danger btn-sm">Usuń</a></div>
                                @endif
                                @if($post->user_id == Auth::user()->id)
                                    <div class="col-1"><a href="{{ route('edit', $post) }}" class="btn btn-info btn-sm">Edytuj</a></div>
                                @endif
                            @endauth
                            <b class="blockquote-footer col-sm d-flex justify-content-end">Autor: {{$post->user->name}}</b>
                        </div>
                        <div class="row p-1">
                            <small class="blockquote-footer col-sm d-flex justify-content-end m-0">{{$post->created_at}}</small>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
    @include('layouts.footer')
</body>
</html>
