<?php

namespace App\Http\Controllers;

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
}
