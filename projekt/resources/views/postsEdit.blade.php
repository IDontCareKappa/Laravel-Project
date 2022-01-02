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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
</head>
<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="table-container fadeIn">
        <div class="title p-2"> <h1 class="text-white">Edycja postu</h1> </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box box-primary p-2 fadeIn">
            <form role="form" id="post-form" method="post"
                  action="{{ route('updatepost', $post) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"
                             id="roles_box">
                            <label><b class="text-white-50">Tytuł</b></label><br>
                            <textarea class="bg-minor p-2" name="title" id="title" cols="50" rows="1" required>{{$post->title}}</textarea>
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }} fadeIn"
                             id="roles_box">
                            <label><b class="text-white-50">Treść</b></label><br>
                            <textarea class="bg-minor p-2" name="message" id="message" cols="50" rows="10" required>{{$post->message}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center fadeIn">
                    <div class="col-sm-11 addPostBtn p-0 fadeIn">
                        <button type="submit" value="" class="box-shadow">
                            <div class="row">
                                <div class="col align-self-start"></div>
                                <div class="col align-self-center">ZAPISZ POST</div>
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
    @include('layouts.footer')
</body>
