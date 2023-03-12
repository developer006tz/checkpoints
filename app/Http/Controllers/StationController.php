<?php

namespace App\Http\Controllers;
use App\Models\Station;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use illuminate\Validation\Rules;

/**
 * Summary of StationController
 */
class StationController extends Controller
{
    //
    public function index():View
    {
        return view('station.index');
    }

    /**
     * Summary of store
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'x_axis' => ['numeric','required', 'max:255'],
            'y_axis' => ['numeric','required', 'max:255'],
            'z_axis' => ['numeric','required', 'max:255'],
            'latitude' => ['numeric','required', 'max:255'],
            'height' => ['numeric','required', 'max:255'],
            'receiver_name' => ['required', 'max:255'],
            'receiver_satellite_system' => ['required', 'max:255'],
            'receiver_serial_number' => ['required', 'max:255'],
            'receiver_firmware_version' => ['required', 'max:255'],
            'receiver_date_installed' => ['required', 'max:255'],
            'antenna_name' => ['required', 'max:255'],
            'antenna_radome' => ['string', 'max:255'],
            'antenna_serial_number' => ['required', 'max:255'],
            'antenna_arp' => ['string', 'max:255'],
            'antenna_marker_north' => ['numeric','required', 'max:255'],
            'antenna_marker_east' => ['numeric','required', 'max:255'],
            'antenna_date_installed' => ['required', 'max:255'],
            'clock_type' => ['required', 'max:255'],
            'clock_input_frequency' => ['numeric'],
            'longitude' => ['numeric','required', 'max:255'],
            'receiver_elevation_cutoff' => ['numeric'],
            'antenna_marker_up' => ['numeric','required', 'max:255'],
            'clock_effective_dates' => ['string', 'max:255'],

        ]);
        

        $station = Station::create($validated);
        return Redirect::route('dashboard')->with('status', 'profile-updated');

    }
}
