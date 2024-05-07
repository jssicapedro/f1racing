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

        $years = Results::selectRaw('YEAR(grandprix.year) as year')
            ->join('grandprix', 'results.GrandPrix_idGrandPrix', '=', 'grandprix.idGrandPrix')
            ->where('results.Driver_idDriver', $id)
            ->distinct()
            ->pluck('year');

        // Obter o ano selecionado pelo utilizador
        $selectedYear = $request->input('year');

        // Obter os resultados do piloto filtrados pelo ano selecionado
        $resultsQuery = Results::with(['driver', 'grandprix'])
            ->where('Driver_idDriver', $id);

        // Filtrar pelos anos selecionados
        if ($selectedYear) {
            $resultsQuery->whereHas('grandprix', function ($query) use ($selectedYear) {
                $query->whereYear('year', $selectedYear);
            });
        }

        // Obter os resultados
        $results = $resultsQuery->get();

        // Organizar os dados para o gráfico
        $labels = [];
        $datasets = [];


        foreach ($results as $result) {
            $labels[] = $result->prix->name;
            $datasets[$result->grandprix->year][] = $result->position;
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
