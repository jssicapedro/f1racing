<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Team;

class IndexController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        $topDrivers = Driver::with('team')->orderByDesc('podiums')->take(3)->get();
        // Obter os IDs dos três melhores pilotos
        $topDriverIds = Driver::orderByDesc('podiums')->take(3)->pluck('idDriver');
        // Obter todos os pilotos, exceto os três melhores
        $otherDrivers = Driver::with('team')
            ->whereNotIn('idDriver', $topDriverIds)
            ->orderByDesc('podiums', 'desc')
            ->get();

        $teams = Team::all();

        return view('index', compact('drivers', 'topDrivers', 'otherDrivers', 'teams'));
    }
}
