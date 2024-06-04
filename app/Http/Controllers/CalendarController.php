<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now();

        $nextRace = Calendar::where('t1', '>=', $currentDate)
            ->orderBy('t1')
            ->first();

        $upcomingRaces = Calendar::where('t1', '>', $nextRace->race)
            ->orderBy('t1')
            ->get();

        if (empty($nextRace) || empty($upcomingRaces)){
            echo "Sem corridas futuras";
        }

        
        return view('calendar', compact('nextRace', 'upcomingRaces'));
    }

    public function show($id){
        $prix = Calendar::findOrFail($id);
        return view('calendar_show', compact('prix'));
    }
}
