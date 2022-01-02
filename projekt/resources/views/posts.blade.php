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
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="table-container fadeIn">
        <div class="title p-2 text-white">
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
            <div class="table-container text-center mt-3 fadeIn">
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
                <div class="card rounded-0 bg-minor p-0 w-75 m-3 box-shadow fadeIn postDemo">
                    <a href="{{ route('show', [$post->id]) }}" class="text-decoration-none">
                    <div class="card-body">
                        <h4 class="card-title text-dark">{{$post->title}}</h4>

                    </div>
                    </a>
                    <div class="card-footer">
                        <div class="d-flex flex-row p-0">
                            <div class="col-sm d-flex justify-content-start">
                                @auth
                                    @if($post->user_id == Auth::user()->id)
{{--                                        <div class="col-4"><a href="{{ route('delete', $post->id) }}" class="btn btn-danger btn-sm">Usuń</a></div>--}}
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-sm-4">
                                                <button type="submit" value="" class="box-shadow smallBtn border-0" onclick="window.location='{{ route('delete', $post->id) }}'">
                                                    <div class="row">
{{--                                                        <div class="col align-self-start "><small class="text-danger">USUŃ</small></div>--}}
                                                        <div class="col align-self-end text-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-danger" height="20" width="20" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <button type="submit" value="" class="box-shadow smallBtn border-0" onclick="window.location='{{ route('edit', $post) }}'">
                                                    <div class="row">
{{--                                                        <div class="col align-self-start "><small class="text-info">EDYTUJ</small></div>--}}
                                                        <div class="col align-self-end text-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-info" height="20" width="20" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
{{--                                        <div class="col-4"><a href="{{ route('edit', $post) }}" class="btn btn-info btn-sm">Edytuj</a></div>--}}
                                    @endif
                                @endauth
                            </div>
{{--                            <a href="{{ route('show', [$post->id]) }}" class="text-decoration-none">--}}
                                <div class="col-sm d-flex justify-content-center">
                                    <p class="text-dark">Zobacz</p>
                                </div>
                            <div class="col-sm d-flex justify-content-end">
                                <p>
                                    <b class="blockquote-footer ">Autor: {{$post->user->name}}</b>
                                    <small class="blockquote-footer ">{{$post->created_at}}</small>
                                </p>
                            </div>
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    @include('layouts.footer')
</body>
</html>
