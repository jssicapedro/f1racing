<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Results;
use App\Models\Prix;
use App\Models\GrandPrix;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('team')
            ->where('mainDriver', 1)
            ->orderBy('Team_idTeam')
            ->get();

        return view('drivers', compact('drivers'));
    }

    public function show(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $points = Driver::select('driver.idDriver', 'driver.firstName as driverName')
            ->leftJoin('results', 'driver.idDriver', '=', 'results.Driver_idDriver')
            ->selectRaw('COALESCE(SUM(results.points), 0) as totalPoints')
            ->groupBy('driver.idDriver', 'driver.firstName')
            ->get();

        $labels = [];
        $datasets = [];
        $pistasPorAno = []; // Array associativo para armazenar as pistas por ano

        foreach ($results as $result) {
            $ano = $result->grandprix->year;
            $labels[$ano][] = $result->prix->name; // Associar o nome da pista ao ano correspondente
            $datasets[$ano][] = $result->position;

            // Adiciona o nome da pista ao array de pistasPorAno
            if (!isset($pistasPorAno[$ano])) {
                $pistasPorAno[$ano] = [];
            }
            $pistasPorAno[$ano][] = $result->prix->name;
        }

        // Montar os dados para o gráfico
        $datasetsFormatted = [];
        foreach ($datasets as $year => $data) {
            $datasetsFormatted[] = [
                'label' => $year, // Usar o ano como label
                'data' => $data,
                'borderColor' => '#' . substr(md5($year), 0, 6),
                'fill' => false
            ];
        }


        return view('driver_show', compact('driver', 'points', 'datasets', 'years', 'selectedYear', 'labels', 'datasetsFormatted'));
    }
}
