@extends('layouts.app')
@section('pagetitle')
    {{ $post->title }}
@endsection
@section('posts', 'active')

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
                    <div class="mt-10 row">
                        <div class="h5 text-muted col-10">
                            OCEŃ POST
                            <a class="bg-dark rounded rounded-3 m-2 text-center h5 p-1 text-decoration-none" style="color: #ce3310;"
                               href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>1.0]) }}"><b>1</b></a>
                            <a class="bg-dark rounded rounded-3 m-2 text-center h5 p-1 text-decoration-none" style="color: #ce6910;"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>2.0]) }}">2</a>
                            <a class="bg-dark rounded rounded-3 m-2 text-center h5 p-1 text-decoration-none" style="color: #ce9f10;"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>3.0]) }}">3</a>
                            <a class="bg-dark rounded rounded-3 m-2 text-center h5 p-1 text-decoration-none" style="color: #b2ce10;"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>4.0]) }}">4</a>
                            <a class="bg-dark rounded rounded-3 m-2 text-center h5 p-1 text-decoration-none" style="color: #62ce10;"
                                   href="{{ route('addGrade', ['id'=>$post->id, 'grade'=>5.0]) }}">5</a>
                        </div>

                        @if($post->user_id == Auth::user()->id)
                            <div class="row col-2">
                                <div class="col-4" >
                                    <form action="{{ route('delete', $post->id) }}">
                                        <button type="submit" value=""  class="box-shadow smallBtn border-0" onclick="return confirm('Jesteś pewien?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-danger" height="20" width="20" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                                <div class="col-6 " >
                                    <form action="{{ route('edit', $post) }}">
                                        <button type="submit" value=""  class="box-shadow smallBtn border-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-info" height="20" width="20" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif

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


