<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class ConstructorsController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('name')->get();
        return view('teams', compact('teams'));
    }

    public function show($id)
    {
        $team = Team::findOrFail($id); // Obter a equipe com base no ID
        return view('team_show', compact('team'));
    }
}
