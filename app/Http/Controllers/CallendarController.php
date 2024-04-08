<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CallendarController extends Controller
{
    public function index()
    {

        return view('callendar');
    }
}
