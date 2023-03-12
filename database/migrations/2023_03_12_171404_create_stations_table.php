<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('x_axis', 10, 7);
            $table->decimal('y_axis', 10, 7);
            $table->decimal('z_axis', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->decimal('height', 10, 2);
            $table->string('receiver_name');
            $table->string('receiver_satellite_system');
            $table->string('receiver_serial_number');
            $table->string('receiver_firmware_version');
            $table->date('receiver_date_installed');
            $table->string('antenna_name');
            $table->string('antenna_radome')->nullable();
            $table->string('antenna_serial_number');
            $table->string('antenna_arp')->nullable();
            $table->decimal('antenna_marker_north', 10, 7);
            $table->decimal('antenna_marker_east', 10, 7);
            $table->date('antenna_date_installed');
            $table->string('clock_type')->nullable();
            $table->integer('clock_input_frequency')->nullable();
            $table->decimal('longitude', 10, 7);
            $table->integer('receiver_elevation_cutoff')->nullable();
            $table->decimal('antenna_marker_up', 10, 7);
            $table->string('clock_effective_dates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
