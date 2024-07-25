<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultRequest;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\Results;
use App\Models\Prix;
use App\Models\GrandPrix;

class ResultController extends Controller
{
    public function index()
    {
        $years = GrandPrix::select('year')->distinct()->orderBy('year', 'desc')->get();
        $tracks = Prix::distinct()->pluck('name');

        return view('result', compact('years', 'tracks'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'track' => 'required|string',
        ]);

        $query = Results::query();

        if ($request->year) {
            $query->whereHas('grandPrix', function ($q) use ($request) {
                $q->where('year', $request->year);
            });
        }

        if ($request->track !== 'all') {
            $query->whereHas('prix', function ($q) use ($request) {
                $q->where('name', $request->track);
            });
        }

        $results = $query->with(['driver', 'prix', 'grandPrix'])->get();

        $years = GrandPrix::select('year')->distinct()->orderBy('year', 'desc')->get();
        $tracks = Prix::distinct()->pluck('name');

        return view('result', compact('results', 'years', 'tracks'));
    }

    public function getTracks(Request $request)
    {
        $tracks = Prix::whereHas('grandPrix', function ($query) use ($request) {
            $query->where('year', $request->year);
        })->distinct()->pluck('name');

        return response()->json($tracks);
    }

    public function view(Request $request)
    {
        $query = Results::query();

        if ($request->filled('year')) {
            $query->whereHas('grandPrix', function ($q) use ($request) {
                $q->where('year', $request->year);
            });
        }

        if ($request->filled('track')) {
            $query->whereHas('prix', function ($q) use ($request) {
                $q->where('name', $request->track);
            });
        }

        $results = $query->orderBy('idResults', 'desc')
            ->orderBy('GrandPrix_idGrandPrix')
            ->with(['driver', 'prix', 'grandPrix'])
            ->paginate(20);

        $years = GrandPrix::select('year')->distinct()->orderBy('year', 'desc')->get();
        $tracks = Prix::distinct()->pluck('name');

        return view('admin.results.index', compact('results', 'years', 'tracks'));
    }

    public function create()
    {
        $grandprix = GrandPrix::all();
        $prix = Prix::all();
        $drivers = Driver::all();

        return view('admin.results.create', compact('prix', 'grandprix', 'drivers'));
    }

    public function store(ResultRequest $request)
    {
        $request->validate([
            'Prix_idPrix' => 'required|exists:prix,idPrix',
            'GrandPrix_idGrandPrix' => 'required|exists:grandprix,idGrandPrix',
            'results.*.Driver_idDriver' => 'required|exists:driver,idDriver',
            'results.*.position' => 'required|in:' . implode(',', array_merge(range(1, count($request->results)), ['NC', 'DNF'])),
            'results.*.points' => 'required|integer',
            'results.*.fastLapNumber' => 'nullable|integer|min:1|max:100', // A placeholder max value, update dynamically
            'results.*.fastLapTime' => 'nullable|regex:/^\d{1}:\d{2}\.\d{3}$/', // Matches the format 1:36.156
        ]);
        try {
            foreach ($request->results as $result) {
                Results::create([
                    'Prix_idPrix' => $request->Prix_idPrix,
                    'GrandPrix_idGrandPrix' => $request->GrandPrix_idGrandPrix,
                    'Driver_idDriver' => $result['Driver_idDriver'],
                    'position' => $result['position'],
                    'points' => $result['points'],
                    'fastLapNumber' => $result['fastLapNumber'],
                    'fastLapTime' => $result['fastLapTime'],
                ]);
            }
            return redirect()->route('admin.results')->with('success', 'Event created successfully.');
        } catch (\Exception $e) {
            \Log::error('Error creating results: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create event.');
        }
    }

    public function edit($id)
    {
        $result = Results::findOrFail($id);
        $prix = Prix::all();
        $grandprix = GrandPrix::all();
        $drivers = Driver::all();

        $track = Prix::find($result->Prix_idPrix);
        $fastLapNumbers = range(1, $track->laps);


        return view('admin.results.edit', compact('result', 'prix', 'grandprix', 'drivers', 'fastLapNumbers'));
    }

    public function update(ResultRequest $request, $id)
    {
        $event = Results::findOrFail($id);


        $validPoints = [25, 18, 15, 12, 10, 8, 6, 4, 2, 1];

        // Atualizar somente os campos que não estão nulos
        $fields = [
            'Prix_idPrix',
            'GrandPrix_idGrandPrix',
            'Driver_idDriver',
            'position',
            'points',
            'fastLapNumber',
            'fastLapTime'
        ];

        foreach ($fields as $field) {
            if ($request->has($field) && $request->input($field) !== null) {
                $event->$field = $request->input($field);
            }
        }

        $event->save();


        return redirect()->route('admin.results')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $result = Results::find($id);

        if (!$result) {
            return redirect()->route('admin.results')->with('error', 'Result not found.');
        }

        $result->delete();

        return redirect()->route('admin.results')->with('success', 'Event delete successfully.');
    }
}
