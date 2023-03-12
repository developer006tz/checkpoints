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
        {{-- main.css --}}
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
   
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
    </style>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')
    <h1 class="text-white">{{_('Register new Station')}}</h1>
    <div class="form-wrapper">
        <form class="add_form">
            <div class="cols-wrapper">
                {{-- left --}}
                <div class="cols left">
                    <div class="form-group">
                        <label for="StationName">StationName:</label>
                        <input type="text" id="StationName" name="StationName">
                    </div>
                    <div class="form-group">
                        <label for="x asis">X axis:</label>
                        <input type="text" id="x asis" name="x">
                    </div>
                    <div class="form-group">
                        <label for="yaxis">Y axis:</label>
                        <input type="text" id="yaxis" name="y">
                    </div>
                    <div class="form-group">
                        <label for="zaxis">Z axis:</label>
                        <input type="text" id="zaxis" name="z">
                    </div>
                    <div class="form-group">
                        <label for="Latitude">Latitude:</label>
                        <input type="text" id="Latitude" name="Latitude">
                    </div>
                    
                </div>
                {{-- center --}}
                
                <div class="cols center">
                                <div class="form-group">
                                    <label for="Height">Height:</label>
                                    <input type="text" id="Height" name="Height">
                                </div>
                                <div class="form-group">
                                    <label for="ReceiverName">ReceiverName:</label>
                                    <input type="text" id="ReceiverName" name="ReceiverName">
                                </div>
                                <div class="form-group">
                                    <label for="ReceiverSatelliteSystem">ReceiverSatelliteSystem:</label>
                                    <input type="text" id="ReceiverSatelliteSystem" name="ReceiverSatelliteSystem">
                                </div>
                                <div class="form-group">
                                    <label for="ReceiverSerialNumber">ReceiverSerialNumber:</label>
                                    <input type="text" id="ReceiverSerialNumber" name="ReceiverSerialNumber">
                                </div>
                                <div class="form-group">
                                    <label for="ReceiverFirmwareVersion">ReceiverFirmwareVersion:</label>
                                    <input type="text" id="ReceiverFirmwareVersion" name="ReceiverFirmwareVersion
">
                                </div>
                                
                </div>
                {{-- center left --}}
                <div class="cols right">
                                     <div class="form-group">
                                    <label for="ReceiverDateInstalled">ReceiverDateInstalled:</label>
                                    <input type="text" id="ReceiverDateInstalled" name="ReceiverDateInstalled">
                                </div>
                                     <div class="form-group">
                                <label for="AntennaName">AntennaName:</label>
                                <input type="text" id="AntennaName" name="AntennaName">
                            </div>
                            <div class="form-group">
                                <label for="AntennaRadome">AntennaRadome:</label>
                                <input type="text" id="AntennaRadome" name="AntennaRadome">
                            </div>
                            <div class="form-group">
                                    <label for="AntennaSerialNumber">AntennaSerialNumber:</label>
                                    <input type="text" id="AntennaSerialNumber" name="AntennaSerialNumber">
                                </div>
                                <div class="form-group">
                                    <label for="AntennaARP">AntennaARP:</label>
                                    <input type="text" id="AntennaARP" name="AntennaARP">
                                </div>
                            
                </div>
                {{-- center right --}}
                <div class="col-last-right">
                    <div class="form-group">
                                    <label for="AntennaMarkerNorth">AntennaMarkerNorth:</label>
                                    <input type="text" id="AntennaMarkerNorth" name="AntennaMarkerNorth">
                                </div>
                                <div class="form-group">
                                    <label for="AntennaMarkerEast">AntennaMarkerEast:</label>
                                    <input type="text" id="AntennaMarkerEast" name="AntennaMarkerEast">
                                </div>
                                <div class="form-group">
                                    <label for="AntennaDateInstalled">AntennaDateInstalled:</label>
                                    <input type="text" id="AntennaDateInstalled" name="AntennaDateInstalled">
                                </div>
                                <div class="form-group">
                                    <label for="ClockType">ClockType:</label>
                                    <input type="text" id="ClockType" name="ClockType">
                                </div>
                                <div class="form-group">
                                    <label for="ClockInputFrequency">ClockInputFrequency:</label>
                                    <input type="text" id="ClockInputFrequency" name="ClockInputFrequency">
                                </div>

                </div>

                {{-- colum submit button --}}
                <div class="cols-left-center">
                    <div class="form-group">
                        <label for="remark">Longitude:</label>
                        <input type="text" name="longitude" id="remark" name="remark">
                </div>
                <div class="custom-form-groups">
                        <label for="remark">ReceiverElevationCutoff:</label>
                        <input type="text" id="ReceiverElevationCutoff" name="ReceiverElevationCutoff">
                </div>
                <div class="custom-form-groups">
                        <label for="AntennaMarkerUp">AntennaMarkerUp:</label>
                        <input type="text" id="AntennaMarkerUp" name="AntennaMarkerUp">
                </div>
                <div class="custom-form-groups">
                        <label for="ClockEffectiveDates">ClockEffectiveDates:</label>
                        <input type="text" id="ClockEffectiveDates" name="ClockEffectiveDates">
                </div>
                <div class="">
                        <label for="samecolor" style="color:#111827;">clearfix</label>
                        <button type="submit">Submit</button>
                </div>
                </div>
            </div>
        
        
        

    </form>

    </div>
    <div class="clearfix"></div>
        </div>
        
</body>
<script src="https://cdn.jsdelivr.net/npm/express/lib/express.min.js"></script>

<script src="app.js"></script>

</html>