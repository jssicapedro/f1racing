<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use Illuminate\Support\Carbon;

class CallendarController extends Controller
{
    public function index()
    {
        $calendar = Calendar::orderBy('t1')->with('prix')->get();
        $nextRace = Calendar::with('prix')
        ->where('t1', '>', Carbon::now())
        ->orderBy('t1')
        ->first();

        $nextRace->t1 = Carbon::parse($nextRace->t1);
        $nextRace->t2 = Carbon::parse($nextRace->t2);
        $nextRace->t3 = Carbon::parse($nextRace->t3);
        $nextRace->sprintQualify = Carbon::parse($nextRace->sprintQualify);
        $nextRace->sprint = Carbon::parse($nextRace->sprint);
        $nextRace->qualify = Carbon::parse($nextRace->qualify);
        $nextRace->race = Carbon::parse($nextRace->race);

        return view('calendar', compact('calendar', 'nextRace'));
    }
}
