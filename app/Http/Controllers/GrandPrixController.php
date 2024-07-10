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
}
