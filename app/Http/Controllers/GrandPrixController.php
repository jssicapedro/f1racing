<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrandPrix;

class GrandPrixController extends Controller
{
    public function view()
    {
        $grandPrix = GrandPrix::paginate(10);
        return view('admin.grandprix.index', compact('grandPrix'));
    }

    public function create()
    {
        return view('admin.grandprix.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameGrandPrix' => 'required|string|max:255',
            'year' => 'required',
        ]);
        /* dd($request); */

        GrandPrix::create([
            'name' => $request->input('nameGrandPrix'),
            'year' => $request->input('year'),
        ]);

        return redirect()->route('admin.grandprix')->with('success', 'Event created successfully.');
    }
}
