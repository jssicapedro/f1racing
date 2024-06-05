<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Team;
use App\Models\Results;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $drivers = Driver::where('mainDriver', 1)->get();

        $topDrivers = Driver::with('team')->orderByDesc('podiums')->take(3)->get();
        $topDriverIds = Driver::orderByDesc('podiums')->take(3)->pluck('idDriver');
        $otherDrivers = Driver::with('team')
            ->whereNotIn('idDriver', $topDriverIds)
            ->orderByDesc('podiums', 'desc')
            ->get();

        $teams = Team::all();

        $results = Results::with('driver', 'prix')
            ->join('driver', 'results.driver_idDriver', '=', 'driver.idDriver')
            ->join('prix', 'results.prix_idPrix', '=', 'prix.idPrix')
            ->select('results.*', 'driver.*', 'prix.*')
            ->orderBy('results.idResults', 'desc')
            ->limit(20)
            ->get();
        $results = $results->sortBy('idResults');

        $currentDate = Carbon::now();

        $currentRace = Calendar::where('t1', '>=', $currentDate)
            ->orderBy('t1')
            ->first();

        $upcomingRace = Calendar::where('t1', '>', $currentRace->race)
            ->orderBy('t1')
            ->first();

        $nextRaces = Calendar::where('t1', '>', $currentRace->race)
        ->orderBy('t1')
        ->get();

        return view('index', compact('drivers', 'topDrivers', 'otherDrivers', 'teams', 'results', 'currentRace', 'upcomingRace', 'nextRaces'));
    }
}
