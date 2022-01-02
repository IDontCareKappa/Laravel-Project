@extends('layouts.app')

@section('pagetitle', 'Kontakt')

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
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
    <div class="table-container fadeIn">
        <div class="title p-2 text-white">
            <h1>Skontaktuj się z nami</h1>
        </div>

        <div id="map" class="fadeIn"></div>

        <div class="card bg-transparent border-0 mt-5 fadeIn">
            <div class="card-body bg-transparent text-white-50 text-uppercase fadeIn">
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0">
                    <b class="h4 col-sm-4 d-flex justify-content-start">ADRES</b>
                    <b class="h4 col-sm-8 d-flex justify-content-end">Nadbystrzycka 38A, 20-618 Lublin</b>
                </div>
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0 mt-5 fadeIn fadeIn">
                    <b class="h4 col-sm-6 d-flex justify-content-start">TELEFON</b>
                    <b class="h4 col-sm-6 d-flex justify-content-end">+48 123 456 789</b>
                </div>
                <div class="border-bottom border-dark col-sm-12 row p-0 m-0 mt-5 fadeIn fadeIn">
                    <b class="h4 col-sm-6 d-flex justify-content-start">E-MAIL</b>
                    <b class="h4 col-sm-6 d-flex justify-content-end">tomasz.ostrowski1@pollub.edu.pl</b>
                </div>

            </div>
        </div>
    </div>

    <script>
        var map = L.map('map').setView([51.236969061154966, 22.54888121363951], 18);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([51.236969061154966, 22.54888121363951]).addTo(map)
            .bindPopup('Tu znajdziesz naszą siedzibę.<br> Zapraszamy!')
            .openPopup();

    </script>
@endsection

