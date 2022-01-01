@include('layouts.app')
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Profil Użytkownika</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
</head>
<h1><b>Your Profile</b></h1>
<form method="POST" action="/profile/update">
    <div class="form-group hidden">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH">
    </div>
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="email" class="control-label"><b>Name:</b></label>
        <input type="text" name="name" placeholder="Please enter your email here" class="form-control" value="{{ Auth::user()->name }}"/>

        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{$errors->first('name')}}</strong>
        </span>
        @endif

    </div>
    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label"><b>Email:</b></label>
        <input type="text" name="email" placeholder="Please enter your email here" class="form-control" value="{{ Auth::user()->email }}"/>

        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{$errors->first('email')}}</strong>
        </span>
        @endif

    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default"> Submit </button>
    </div>
</form>
