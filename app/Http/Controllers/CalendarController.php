<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use Illuminate\Support\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        $calendar = Calendar::orderBy('t1')->with('prix')->get();
        
        $calendar->each(function ($event) {
            $event->t1 = Carbon::parse($event->t1);
            $event->t2 = Carbon::parse($event->t2);
            $event->t3 = Carbon::parse($event->t3);
            $event->sprintQualify = Carbon::parse($event->sprintQualify);
            $event->sprint = Carbon::parse($event->sprint);
            $event->qualify = Carbon::parse($event->qualify);
            $event->race = Carbon::parse($event->race);
        });

        $nextRace = Calendar::with('prix')
            ->where('t1', '>', Carbon::now())
            ->orderBy('t1')
            ->first();

        if (!$nextRace) {
            $nextRace = $calendar->first();
        } else {
            $nextRace->t1 = Carbon::parse($nextRace->t1);
            $nextRace->t2 = Carbon::parse($nextRace->t2);
            $nextRace->t3 = Carbon::parse($nextRace->t3);
            $nextRace->sprintQualify = Carbon::parse($nextRace->sprintQualify);
            $nextRace->sprint = Carbon::parse($nextRace->sprint);
            $nextRace->qualify = Carbon::parse($nextRace->qualify);
            $nextRace->race = Carbon::parse($nextRace->race);
        }

        return view('calendar', compact('calendar', 'nextRace'));
    }
}
