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
    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
        }
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <div class="title p-2 bg-dark text-primary rounded-bottom">
            <h1>Posty użytkowników</h1>
        </div>
        @auth
{{--        <table data-toggle="table">--}}
{{--            <thead>--}}
{{--                <tr>--}}
{{--                    <th>#</th>--}}
{{--                    <th>Użytkownik</th>--}}
{{--                    <th>Data dodania</th>--}}
{{--                    <th>Tytuł</th>--}}
{{--                    <th>Post</th>--}}
{{--                </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($posts as $post)--}}
{{--                    <tr>--}}
{{--                        <td>{{$post->id}}</td>--}}
{{--                        <td>{{$post->user->name}}</td>--}}
{{--                        <td>{{$post->created_at}}</td>--}}
{{--                        <td>{{$post->title}}</td>--}}
{{--                        <td>{{$post->message}}</td>--}}
{{--                    </tr>--}}
{{--            @endforeach--}}
{{--             </tbody>--}}
{{--        </table>--}}
        <div class="row d-flex justify-content-center mt-2">
            <div class="accordion-button m-2">
                <a href="{{ route('create') }}" class="btn btn-secondary">Dodaj Post</a>
            </div>
        </div>

        @endauth

        @guest
            <div class="table-container text-center mt-3">
                <b>Zaloguj się aby dodawać posty.</b>
                <br>
                <div class="accordion-button mt-1">
                    <a href="{{ route('login') }}" class="btn btn-secondary">Zaloguj się</a>
                </div>
            </div>
        @endguest

        <div class="row d-flex justify-content-center mt-5">
            @foreach($posts as $post)
                <div class="card bg-dark text-white p-2 w-75 m-4">
                    <div class="card-body">
                        <h4 class="card-title text-primary">{{$post->title}}</h4>
                        <p class="card-text p-3">{{$post->message}}</p>
                    </div>
                    <div class="card-footer"><b class="row d-flex justify-content-end">Autor: {{$post->user->name}}</b> <small class="row d-flex justify-content-end">{{$post->created_at}}</small></div>
                </div>
            @endforeach
        </div>

    </div>

</body>
</html>
