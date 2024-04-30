<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;
use App\Models\Team;
use App\Models\Results;

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
            ->select('results.*', 'driver.*', 'prix.*') // seleciona todas as colunas de todas as tabelas
            ->orderBy('prix.idPrix', 'desc')
            ->limit(20)
            ->get();

        return view('index', compact('drivers', 'topDrivers', 'otherDrivers', 'teams', 'results'));
    }
}
