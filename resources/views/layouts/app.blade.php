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
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
         <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
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
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

       

        var satelliteIcon = L.icon({
                iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

        const coordinates = [
            { lat: 1.3733, lng: 32.2903, name: "Uganda" },
            { lat: -1.2921, lng: 36.8219, name: "Kenya" },
            { lat: -6.3690, lng: 34.8888, name: "Tanzania" },
            { lat: 26.8206, lng: 30.8025, name: "Egypt" },
            { lat: -30.5595, lng: 22.9375, name: "South Africa" }
        ];

        var marker = L.marker([0.347596, 32.58252], { icon: satelliteIcon }).addTo(map);
            marker.bindPopup("<b>Uganda</b><br>Coordinates: 0.347596, 32.58252").openPopup();

            var marker2 = L.marker([-1.292066, 36.821946], { icon: satelliteIcon }).addTo(map);
            marker2.bindPopup("<b>Kenya</b><br>Coordinates: -1.292066, 36.821946").openPopup();

            var marker3 = L.marker([-6.369028, 34.888822], { icon: satelliteIcon }).addTo(map);
            marker3.bindPopup("<b>Tanzania</b><br>Coordinates: -6.369028, 34.888822").openPopup();

            var marker4 = L.marker([26.820553, 30.802498], { icon: satelliteIcon }).addTo(map);
            marker4.bindPopup("<b>Egypt</b><br>Coordinates: 26.820553, 30.802498").openPopup();

            var marker5 = L.marker([-30.559482, 22.937506], { icon: satelliteIcon }).addTo(map);
            marker5.bindPopup("<b>South Africa</b><br>Coordinates: -30.559482, 22.937506").openPopup();
        </script>
    </body>
</html>
