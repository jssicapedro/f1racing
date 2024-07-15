<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\GrandPrix;
use App\Models\Prix;
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

    public function view()
    {
        $calendars = Calendar::with('prix')->select('idCalendar', 'Prix_idPrix', 'GrandPrix_idGrandPrix', 't1', 't2', 't3', 'sprintQualify', 'qualify', 'race')->get();

        $events = [];

        foreach ($calendars as $calendar) {
            $prixName = $calendar->prix->name ?? 'Unknown Prix'; // Fetch the name of the prix or 'Unknown Prix' if not found

            if ($calendar->t1) {
                $events[] = [
                    'id' => $calendar->idCalendar,
                    'title' => "T1 - $prixName",
                    'start' => $calendar->t1,
                ];
            }
            if ($calendar->t2) {
                $events[] = [
                    'id' => $calendar->idCalendar,
                    'title' => "T2 - $prixName",
                    'start' => $calendar->t2,
                ];
            }
            if ($calendar->t3) {
                $events[] = [
                    'id' => $calendar->idCalendar,
                    'title' => "T3 - $prixName",
                    'start' => $calendar->t3,
                ];
            }
            if ($calendar->sprintQualify) {
                $events[] = [
                    'id' => $calendar->idCalendar,
                    'title' => "Sprint Qualify - $prixName",
                    'start' => $calendar->sprintQualify,
                ];
            }
            if ($calendar->sprint) {
                $events[] = [
                    'id' => $calendar->idCalendar,
                    'title' => "Sprint - $prixName",
                    'start' => $calendar->sprint,
                ];
            }
            if ($calendar->qualify) {
                $events[] = [
                    'id' => $calendar->idCalendar,
                    'title' => "Qualify - $prixName",
                    'start' => $calendar->qualify,
                ];
            }
            if ($calendar->race) {
                $events[] = [
                    'id' => $calendar->idCalendar,
                    'title' => "Race - $prixName",
                    'start' => $calendar->race,
                ];
            }
        }

        return view('admin.calendar.index', compact('events'));
    }

    public function create()
    {
        $prix = Prix::all();
        $grandprix = GrandPrix::all();
        $nextId = Calendar::max('idCalendar') + 1;

        return view('admin.calendar.create', compact('nextId', 'prix', 'grandprix'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Prix_idPrix' => 'required|exists:prix,idPrix',
            'GrandPrix_idGrandPrix' => 'required|exists:grandprix,idGrandPrix',
            't1' => 'date|required',
            't2' => 'nullable|date',
            't3' => 'nullable|date',
            'sprintQualify' => 'nullable|date',
            'sprint' => 'nullable|date',
            'qualify' => 'date|required',
            'race' => 'date|required',
        ]);

        $data = $request->only(['Prix_idPrix', 'GrandPrix_idGrandPrix', 't1', 't2', 't3', 'sprintQualify', 'sprint', 'qualify', 'race']);

        

        Calendar::create($data);

        return redirect()->route('admin.calendar')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $day = Calendar::findOrFail($id);
        $prix = Prix::all();
        $grandprix = GrandPrix::all();
        return view('admin.calendar.edit', compact('day', 'prix', 'grandprix'));
    }

    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'Prix_idPrix' => 'nullable|exists:prix,idPrix', // Permite nulo, mas se não for nulo deve existir
            'GrandPrix_idGrandPrix' => 'nullable|exists:grandprix,idGrandPrix',
            't1' => 'nullable|date',
            't2' => 'nullable|date',
            't3' => 'nullable|date',
            'qualifysprint' => 'nullable|date',
            'sprint' => 'nullable|date',
            'qualify' => 'nullable|date',
            'race' => 'nullable|date',
        ]);

        // Encontrar o evento
        $event = Calendar::findOrFail($id);

        // Atualizar somente os campos que não estão nulos
        $input = $request->only(['Prix_idPrix', 'GrandPrix_idGrandPrix', 't1', 't2', 't3', 'qualifysprint', 'sprint', 'qualify', 'race']);

        foreach ($input as $key => $value) {
            if ($value !== null) {
                $event->$key = $value; // Atualiza apenas se o valor não for nulo
            }
        }

        $event->save();


        return redirect()->route('admin.calendar')->with('success', 'Event updated successfully.');
    }

    public function destroy($id){
        Calendar::destroy($id);
        return redirect()->route('admin.calendar');
    }
}
