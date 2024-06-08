<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\GrandPrix;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now();

        $nextRace = Calendar::where(function ($query) use ($currentDate) {
            $query->where('t1', '>=', $currentDate)
                ->orWhere('race', '>=', $currentDate);
        })
            ->orderBy('t1')
            ->first();

        $upcomingRaces = Calendar::where('t1', '>', $nextRace->race)
            ->orderBy('t1')
            ->get();

        if (empty($nextRace) || empty($upcomingRaces)) {
            echo "Sem corridas futuras";
        }


        return view('calendar', compact('nextRace', 'upcomingRaces'));
    }

    public function show($id)
    {
        $prix = Calendar::findOrFail($id);
        $year = $prix->grandprix->year;

        return view('calendar_show', compact('prix', 'year'));
    }
}
