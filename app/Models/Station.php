<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'x_axis',
        'y_axis',
        'z_axis',
        'latitude',
        'height',
        'receiver_name',
        'receiver_satellite_system',
        'receiver_serial_number',
        'receiver_firmware_version',
        'receiver_date_installed',
        'antenna_name',
        'antenna_radome',
        'antenna_serial_number',
        'antenna_arp',
        'antenna_marker_north',
        'antenna_marker_east',
        'antenna_date_installed',
        'clock_type',
        'clock_input_frequency',
        'longitude',
        'receiver_elevation_cutoff',
        'antenna_marker_up',
        'clock_effective_dates'
    ];

    protected $casts = [
        'receiver_date_installed' => 'date',
        'antenna_date_installed' => 'date'
    ];
}
