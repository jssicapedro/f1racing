<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('team')
            ->where('mainDriver', 1)
            ->orderBy('Team_idTeam')
            ->get();

        return view('drivers', compact('drivers'));
    }

    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver_show', compact('driver'));
    }
}
