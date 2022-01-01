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
    <style>
        body{
            background-color: #111010;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            max-width: 900px;
            margin: 0 auto;
        }
        .box {
            display: flex;
            justify-content: center;
        }
        .box-footer{
            float: right;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <div class="title bg-main p-2"> <h3 class="text-white">Edycja postu</h3> </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box box-primary bg-main p-2 rounded-bottom">
            <form role="form" id="post-form" method="post"
                  action="{{ route('updatepost', $post) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="box bg-main">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"
                             id="roles_box">
                            <label><b class="text-white-50">Tytuł</b></label><br>
                            <textarea class="rounded bg-secondary text-white p-1" name="title" id="title" cols="50" rows="1" required>{{$post->title}}</textarea>
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}"
                             id="roles_box">
                            <label><b class="text-white-50">Treść</b></label><br>
                            <textarea class="rounded bg-secondary text-white p-1" name="message" id="message" cols="50" rows="10" required>{{$post->message}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
</body>
