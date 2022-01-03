@extends('layouts.app')

@section('pagetitle')
    {{ $post->title }}
@endsection

@section('scripts')
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
@endsection
@section('background')
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
@endsection
@section('content')
    <div class="table-container fadeIn">

        <div class="card bg-transparent rounded-0 border-0 fadeIn text-white">
            <div class="card-header border-0 bg-transparent">
                <h1 class="h1 mt-5">{{$post->title}}</h1>
                <b class="blockquote-footer">{{ $post->user->name }}</b>
                <small class="blockquote-footer">{{ $post->created_at  }}</small>
            </div>
            <div class="card-body border-0 mt-10">
                <p class="post">{{ $post->message }}</p>
                @auth
                    <div class="mt-10">
                        <p class="h5 text-muted">
                            OCEŃ POST
                            <span class="bg-dark rounded-circle m-2">
                                <a class="text-white h5 p-2"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>1.0]) }}">1</a>
                            </span>
                            <span class="bg-dark rounded-circle m-2">
                                <a class="text-white h5 p-2"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>2.0]) }}">2</a>
                            </span>
                            <span class="bg-dark rounded-circle m-2">
                                <a class="text-white h5 p-2"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>3.0]) }}">3</a>
                            </span>
                            <span class="bg-dark rounded-circle m-2">
                                <a class="text-white h5 p-2"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>4.0]) }}">4</a>
                            </span>
                            <span class="bg-dark rounded-circle m-2">
                                <a class="text-white h5 p-2"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>5.0]) }}">5</a>
                            </span>
                        </p>

                    </div>
                @endauth
            </div>

            <div class="card-footer border-0 mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 addPostBtn p-0">
                        <button type="submit" value="" class="box-shadow"
                                onclick="window.location='{{ route('posts') }}'">
                            <span class="row">
                                <span class="col align-self-start d-flex justify-content-start">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                </span>
                                <span class="col align-self-center">POWRÓT</span>
                                <span class="col align-self-end text-end"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


