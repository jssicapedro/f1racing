<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Driver;

class ConstructorsController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('name')->get();
        return view('teams', compact('teams'));
    }

    public function show($id)
    {
        $team = Team::findOrFail($id); 

        $cars = $team->car;
        
        $drivers = Driver::where('Team_idTeam', $id)
                ->where('mainDriver', 1)
                ->get();

        return view('team_show', compact('team', 'cars', 'drivers'));
    }
}
