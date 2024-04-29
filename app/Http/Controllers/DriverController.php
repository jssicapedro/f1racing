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

        $points = Driver::select('driver.idDriver', 'driver.firstName as driverName')
            ->leftJoin('results', 'driver.idDriver', '=', 'results.Driver_idDriver')
            ->selectRaw('COALESCE(SUM(results.points), 0) as totalPoints')
            ->groupBy('driver.idDriver', 'driver.firstName')
            ->get();


        return view('driver_show', compact('driver', 'points'));
    }
}
