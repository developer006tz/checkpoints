<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StationController extends Controller
{
    //
    public function index()
    {
        return view('station.index');
    }
}
