<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class ConstructorsController extends Controller
{
    public function index()
    {
        return view('constructors');
    }
}
