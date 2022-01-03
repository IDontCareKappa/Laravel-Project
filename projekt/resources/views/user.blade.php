@extends('layouts.app')

@section('pagetitle', 'Edycja profilu')


@section('scripts')
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
@endsection
@section('background')
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
@endsection
@section('content')
<div class="table-container fadeIn ">
    <div class="">
        <div class="title p-2"> <h1 class="text-white">Twój profil</h1> </div>
        <form method="POST" action="/profile/update">
            <div class="form-group hidden">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
            </div>
            <div class="box">
                <div class="col d-flex justify-content-center">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-6 fadeIn">
                        <label for="name" class="control-label text-white"><b>Nazwa:</b></label>
                        <input type="text" name="name" id="name" placeholder="Wprowadź swoją nazwę użytkownika" class="form-control" value="{{ Auth::user()->name }}"/>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif

                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-6 fadeIn">
                        <label for="email" class="control-label text-white"><b>Email:</b></label>
                        <input type="text" name="email" id="email" placeholder="Wprowadź swój adres e-mail" class="form-control" value="{{ Auth::user()->email }}"/>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif

                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center fadeIn">
                <div class="col-sm-11 addPostBtn p-0 ">
                    <button type="submit" value="" class="box-shadow">
                        <span class="row">
                            <span class="col align-self-start"></span>
                            <span class="col align-self-center">ZAPISZ</span>
                            <span class="col align-self-end text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" viewBox="-80 5 100 10" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

