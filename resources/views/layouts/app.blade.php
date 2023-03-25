<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'IGS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        .add-btn {
            color: rgb(5, 138, 54);
            padding: 5px 20px;
            margin-top: 4px;
            float: right;
            margin-right: 5px;
        }

        .button-wrapper{
            border: 1px solid rgb(0, 255, 94);
            width: 90%;
        }

        .add-btn.excel{
            background: rgb(183, 245, 206);
        }
    </style>
    <body class="font-sans antialiased">
        @php
$stations = App\Models\Station::all();
// $stations = json_encode($stations);

    @endphp
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            var map = L.map('map').setView([0, 0], 2);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
		subdomains: 'abcd',
		maxZoom: 19
	});
	CartoDB_DarkMatter.addTo(map);

	// Google Map Layer

	googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
		maxZoom: 20,
		subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
	});
	googleStreets.addTo(map);

    // // Satelite Layer
	// googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
	// 	maxZoom: 20,
	// 	subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
	// });
	// googleSat.addTo(map);

       

        var satelliteIcon = L.icon({
                iconUrl: 'https://img.icons8.com/emoji/48/null/green-circle-emoji.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [13, 15],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [10, 10]
            });

            @foreach($stations as $station)
            var marker = L.marker([{{ $station->latitude }}, {{ $station->longitude }}],{icon: satelliteIcon}).addTo(map);
            marker.bindPopup("<div style='color: green;padding:3px;' class='bg-green-500 text text-success text-center'>{{ $station->name }}</div><div class='text-success'>Receiver: {{ $station->receiver_name }}</div><div class='text-success'>RSS: {{ $station->receiver_satellite_system }}</div><div class='text-success'>Antena: {{ $station->antenna_name }}</div><div class='text-success'>Clock: {{ $station->clock_type }}</div>");

            @endforeach

       
        </script>
        <a target="_blank" href="https://icons8.com/icon/FkQHNSmqWQWH/green-circle">Green Circle icon by Icons8</a>
    </body>
</html>
