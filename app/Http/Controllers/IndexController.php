<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class IndexController extends Controller
{
    public function index()
    {
        $drivers = Driver::all(); // Obtém todos os dados do banco de dados
        return view('index', ['drivers' => $drivers]);
    }
}
