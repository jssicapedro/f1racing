<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrandPrixRequest;
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

    public function store(GrandPrixRequest $request)
    {
        GrandPrix::create([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
        ]);

        return redirect()->route('admin.grandprix')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $grandprix = GrandPrix::findOrFail($id);

        return view('admin.grandprix.edit', compact('grandprix'));
    }

    public function update(GrandPrixRequest $request, $id)
    {
        $event = GrandPrix::findOrFail($id);

        $fields = [
            'name',
            'year'
        ];

        foreach ($fields as $field) {
            if ($request->has($field) && $request->input($field) !== null) {
                $event->$field = $request->input($field);
            }
        }

        $event->save();

        return redirect()->route('admin.grandprix')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $result = GrandPrix::destroy($id);

        if (!$result) {
            return redirect()->route('admin.grandprix')->with('error', 'Result not found.');
        }

        return redirect()->route('admin.grandprix')->with('success', 'Event delete successfully.');
    }
}
