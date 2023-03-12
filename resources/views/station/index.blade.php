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
        <form class="add_form" method="POST" action="{{ route('station.store') }}">
            @csrf
            <div class="cols-wrapper">
                {{-- left --}}
                <div class="cols left">
                    <div class="form-group">
                        <x-input-label for="name" :value="__('Station Name:')" />
                        <x-text-input class="text-input" type="text" :value="old('name')" id="name" name="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="x_axis" :value="__('X axis:')" />
                        <x-text-input class="text-input" type="number" :value="old('x_axis')" id="x_axis" name="x_axis" />
                        <x-input-error :messages="$errors->get('x_axis')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="y_axis" :value="__('Y axis:')" />
                        <x-text-input class="text-input" type="number" :value="old('y_axis')" id="y_axis" name="y_axis" />
                        <x-input-error :messages="$errors->get('y_axis')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="z_axis" :value="__('Z axis:')" />
                        <x-text-input class="text-input" type="number" :value="old('z_axis')" id="z_axis" name="z_axis" />
                        <x-input-error :messages="$errors->get('z_axis')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="latitude" :value="__('Latitude:')" />
                        <x-text-input class="text-input" type="number" :value="old('latitude')" id="latitude" name="latitude" />
                        <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
                    </div>
                    
                </div>
                {{-- center --}}
                
                <div class="cols center">
                                <div class="form-group">
                                    <x-input-label for="height" :value="__('Height:')" />
                                    <x-text-input class="text-input" type="number" :value="old('height')" id="height" name="height" />
                                    <x-input-error :messages="$errors->get('height')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="receiver_name" :value="__('Receiver Name:')" />
                                    <x-text-input class="text-input" type="text" :value="old('receiver_name')" id="receiver_name" name="receiver_name" />
                                    <x-input-error :messages="$errors->get('receiver_name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="receiver_satellite_system" :value="__('Receiver Satellite System:')" />
                                    <x-text-input class="text-input" type="text" :value="old('receiver_satellite_system')" id="receiver_satellite_system" name="receiver_satellite_system" />
                                    <x-input-error :messages="$errors->get('receiver_satellite_system')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="receiver_serial_number" :value="__('Receiver Serial Number:')" />
                                    <x-text-input class="text-input" type="text" :value="old('receiver_serial_number')" id="receiver_serial_number" name="receiver_serial_number" />
                                    <x-input-error :messages="$errors->get('receiver_serial_number')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="receiver_firmware_version" :value="__('Receiver Firmware Version:')" />
                                    <x-text-input class="text-input" type="text" :value="old('receiver_firmware_version')" id="receiver_firmware_version" name="receiver_firmware_version" />
                                    <x-input-error :messages="$errors->get('receiver_firmware_version')" class="mt-2" />

                                </div>
                                
                </div>
                {{-- center left --}}
                <div class="cols right">
                                     <div class="form-group">
                                    <x-input-label for="receiver_date_installed" :value="__('Receiver Date Installed:')" />
                                    <x-text-input class="text-input" type="date" id="receiver_date_installed" name="receiver_date_installed" :value="old('receiver_date_installed')" />
                                    <x-input-error :messages="$errors->get('receiver_date_installed')" class="mt-2" />
                                </div>
                                     <div class="form-group">
                                <x-input-label for="antenna_name" :value="__('Antenna Name:')" />
                                <x-text-input type="text" :value="old('antenna_name')" id="antenna_name" name="antenna_name" />
                                <x-input-error :messages="$errors->get('antenna_name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="antenna_radome" :value="__('Antenna Radome:')" />
                                <x-text-input type="text" :value="old('antenna_radome')" id="antenna_radome" name="antenna_radome" />
                                <x-input-error :messages="$errors->get('antenna_radome')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                    <x-input-label for="antenna_serial_number" :value="__('Antenna Serial Number:')" />
                                    <x-text-input type="text" :value="old('antenna_serial_number')" id="antenna_serial_number" name="antenna_serial_number" />
                                    <x-input-error :messages="$errors->get('antenna_serial_number')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="antenna_arp" :value="__('Antenna ARP:')" />
                                    <x-text-input type="text" :value="old('antenna_arp')" id="antenna_arp" name="antenna_arp" />
                                    <x-input-error :messages="$errors->get('antenna_arp')" class="mt-2" />
                                </div>
                            
                </div>
                {{-- center right --}}
                <div class="col-last-right">
                    <div class="form-group">
                                    <x-input-label for="antenna_marker_north" :value="__('Antenna Marker North:')" />
                                    <x-text-input type="number" :value="old('antenna_marker_north')" id="antenna_marker_north" name="antenna_marker_north" />
                                    <x-input-error :messages="$errors->get('antenna_marker_north')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="antenna_marker_east" :value="__('Antenna Marker East:')" />
                                    <x-text-input type="number" :value="old('antenna_marker_east')" id="antenna_marker_east" name="antenna_marker_east" />
                                    <x-input-error :messages="$errors->get('antenna_marker_east')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="antenna_date_installed" :value="__('Antenna Date Installed:')" />
                                    <x-text-input type="date" id="antenna_date_installed" name="antenna_date_installed" :value="old('antenna_date_installed')" />
                                    <x-input-error :messages="$errors->get('antenna_date_installed')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="clock_type" :value="__('ClockType:')" />
                                    <x-text-input type="text" :value="old('clock_type')" id="clock_type" name="clock_type" />
                                    <x-input-error :messages="$errors->get('clock_type')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="clock_input_frequency" :value="__('Clock Input Frequency:')" />
                                    <x-text-input type="number" :value="old('clock_input_frequency')" id="clock_input_frequency" name="clock_input_frequency" />
                                    <x-input-error :messages="$errors->get('clock_input_frequency')" class="mt-2" />
                                </div>

                </div>

                {{-- colum submit button --}}
                <div class="cols-left-center">
                    <div class="form-group">
                        <x-input-label for="longitude" :value="__('Longitude:')" />
                        <x-text-input type="number" :value="old('longitude')" id="longitude" name="longitude" />
                        <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
                </div>
                <div class="custom-form-groups">
                        <x-input-label for="receiver_elevation_cutoff" :value="__('Receiver Elevation Cutoff:')" />
                        <x-text-input type="number" :value="old('receiver_elevation_cutoff')" id="receiver_elevation_cutoff" name="receiver_elevation_cutoff" />
                        <x-input-error :messages="$errors->get('receiver_elevation_cutoff')" class="mt-2" />
                </div>
                <div class="custom-form-groups">
                        <x-input-label for="antenna_marker_up" :value="__('Antenna MarkerUp:')" />
                        <x-text-input type="number" :value="old('antenna_marker_up')" id="antenna_marker_up" name="antenna_marker_up" />
                        <x-input-error :messages="$errors->get('antenna_marker_up')" class="mt-2" />
                </div>
                <div class="custom-form-groups">
                        <x-input-label for="clock_effective_dates" :value="__('Clock Effective Dates:')" />
                        <x-text-input type="date" id="clock_effective_dates" name="clock_effective_dates" :value="old('clock_effective_dates')" />
                        <x-input-error :messages="$errors->get('clock_effective_dates')" class="mt-2" />
                </div>
                <div class="">
                        <x-input-label for="samecolor" style="color:#111827;" :value="__('submit')" />
                        <button type="submit" name="submit">Submit</button>
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