<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Team;

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
}