<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Support\Facades\DB;
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

        // Subconsulta para calcular a pontuação total de cada piloto
        $subquery = DB::table('results')
            ->selectRaw('SUM(points) as points, Driver_idDriver')
            ->where('GrandPrix_idGrandPrix', function ($query) {
                $query->select('idGrandPrix')
                    ->from('grandPrix')
                    ->orderByDesc('year')
                    ->limit(1);
            })
            ->groupBy('Driver_idDriver');

        // Consulta para obter os 3 principais pilotos com base na pontuação
        $topDrivers = Driver::with('team')
            ->select('driver.*', 'sub.points as points')
            ->leftJoinSub($subquery, 'sub', function ($join) {
                $join->on('driver.idDriver', '=', 'sub.Driver_idDriver');
            })
            ->orderByDesc('points')
            ->take(3)
            ->get();

        // IDs dos 3 principais pilotos
        $topDriverIds = $topDrivers->pluck('idDriver');

        // Outros pilotos com base na pontuação
        $otherDrivers = Driver::with('team')
            ->select('driver.*', 'sub.points as points')
            ->leftJoinSub($subquery, 'sub', function ($join) {
                $join->on('driver.idDriver', '=', 'sub.Driver_idDriver');
            })
            ->whereNotIn('driver.idDriver', $topDriverIds)
            ->where('mainDRiver', 1)
            ->orderByDesc('points')
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

        $currentRace = Calendar::where(function ($query) use ($currentDate) {
            $query->where('t1', '>=', $currentDate)
                ->orWhere('race', '>=', $currentDate);
        })
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
