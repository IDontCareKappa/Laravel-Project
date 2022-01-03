@extends('layouts.app')

@section('pagetitle', 'Edycja postu')

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
        <div class="title p-2"><h1 class="text-white">Edycja postu</h1></div>
        <div class="box box-primary p-2 fadeIn">
            <form id="post-form" method="post"
                  action="{{ route('updatepost', $post) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label><b class="text-white-50">Tytuł</b></label><br>
                            <textarea class="bg-minor p-2" name="title" id="title" cols="50" rows="1"
                                      required>{{$post->title}}</textarea>
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }} fadeIn"
                             id="roles_box">
                            <label><b class="text-white-50">Treść</b></label><br>
                            <textarea class="bg-minor p-2" name="message" id="message" cols="50" rows="10"
                                      required>{{$post->message}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center fadeIn">
                    <div class="col-sm-11 addPostBtn p-0 fadeIn">
                        <button type="submit" value="" class="box-shadow">
                            <span class="row">
                                <span class="col align-self-start"></span>
                                <span class="col align-self-center">ZAPISZ POST</span>
                                <span class="col align-self-end d-flex justify-content-end my-auto">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
