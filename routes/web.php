<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/logs', function () {
    $logFile = storage_path('logs/laravel-' . strtolower(date('D')) . '-' . date('Y-m-d') . '.log');

    if (File::exists($logFile)) {
        $logs = File::get($logFile);

        preg_match_all('/\[(.*)\].*\[(.*)\]: (.*)/', $logs, $matches, PREG_SET_ORDER);

        $logs = array_map(function ($log) {
            $time = \Carbon\Carbon::createFromTimestamp($log[1])->format('Y-m-d H:i:s.v');
            return [
                'time' => $time,
                'level' => $log[2],
                'message' => $log[3]
            ];
        }
            , $matches);
    } else {
        $logs = [];
    }

    return view('logs/logs', ['logs' => $logs]);
});


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/station', [StationController::class, 'index'])->name('station.index');
    Route::post('station', [StationController::class, 'store'])->name('station.store');
    Route::get('/station/excel', [StationController::class, 'excel'])->name('station.excel');
    Route::post('/station/excel', [StationController::class, 'uploadByExcel'])->name('station.uploadByExcel');
    // Route::get('/station/{station}', [StationController::class, 'show'])->name('station.show');
    Route::get('/station/getsample/sample_station_', [StationController::class, 'getsample'])->name('station.getsample');
    //display()
    Route::get('/station/display', [StationController::class, 'display'])->name('station.display');



});

require __DIR__.'/auth.php';
