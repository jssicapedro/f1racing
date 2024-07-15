<?php

namespace App\Http\Controllers;

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

    public function view()
    {
        $results = Results::orderBy('GrandPrix_idGrandPrix', 'asc')
                            ->paginate(10);
        return view('admin.results.index', compact('results'));
    }

    public function create(){
        $prix = Prix::all();
        $grandprix = GrandPrix::all();
        $drivers = Driver::all();

        return view('admin.results.create', compact('prix', 'grandprix', 'drivers'));
    }

    public function store(Request $request){
        $request->validate([
        'Prix_idPrix' => 'required|exists:prix,idPrix',
        'GrandPrix_idGrandPrix' => 'required|exists:grandprix,idGrandPrix',
        'results.*.Driver_idDriver' => 'required|exists:driver,idDriver',
        'results.*.position' => 'required|in:' . implode(',', array_merge(range(1, count($request->results)), ['NC', 'DNF'])),
        'results.*.points' => 'required|integer',
        'results.*.fastLapNumber' => 'nullable|integer|min:1|max:100', // A placeholder max value, update dynamically
        'results.*.fastLapTime' => 'nullable|regex:/^\d{1}:\d{2}\.\d{3}$/', // Matches the format 1:36.156
    ]);

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
    }
}
