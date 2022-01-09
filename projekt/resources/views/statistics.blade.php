@extends('layouts.app')
@section('pagetitle', 'Dodaj post')
@section('posts', 'active')

@section('scripts')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Post</title>
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
        <div class="title  p-2"><h1 class="text-white">Statystyki twojego profilu</h1></div>

        <div class="card bg-transparent border-0 mt-5 fadeIn">
            <div class="card-body bg-transparent text-white-50 text-uppercase fadeIn">
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0">
                    <b class="h4 col-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start">Liczba postów</b>
                    <b class="h4 col-12 col-md-8  col-lg-8  d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end">{{ $postCount }}</b>
                </div>
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0 mt-5 fadeIn fadeIn">
                    <b class="h4 col-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start">Średnia ocen</b>
                    <b class="h4 col-12 col-md-8  col-lg-8  d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end">{{ $meanGrade }}/5</b>
                </div>
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0 mt-5 fadeIn fadeIn">
                    <b class="h4 col-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start">Najwyższa ocena</b>
                    <b class="h4 col-12 col-md-8  col-lg-8  d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end">{{ $maxGrade }}/5</b>
                </div>
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0 mt-5 fadeIn fadeIn">
                    <b class="h4 col-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start">Wiek konta </b>
                    <b class="h4 col-12 col-md-8  col-lg-8  d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end">
                        @if($accountAge == 1)
                            {{ $accountAge }} dzień
                        @else
                            {{ $accountAge }} dni
                        @endif
                    </b>
                </div>
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0 mt-5 fadeIn fadeIn">
                    <b class="h4 col-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start">Konto utworzono</b>
                    <b class="h4 col-12 col-md-8  col-lg-8  d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end">{{ $createdAt }}</b>
                </div>
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0 mt-5 fadeIn fadeIn">
                    <b class="h4 col-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start">Ostatnia modyfikacja </b>
                    <b class="h4 col-12 col-md-8  col-lg-8  d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end">{{ $lastUpdate }}</b>
                </div>
            </div>
        </div>

    </div>
@endsection
