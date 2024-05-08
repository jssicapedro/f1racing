<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Prix;

class PrixController extends Controller
{
    public function index(Request $request)
    {
        $prixs = Prix::paginate(6);
        Paginator::useBootstrap();



        $filter = $request->input('filter');

        // Verifica se o filtro está vazio ou se está definido como 'all'
        if ($filter === 'all' || empty($filter)) {
            // Se 'all' ou vazio, mostra todas as pistas
            $prixs = Prix::paginate(6);
        } else {
            // Caso contrário, filtra as pistas pelo país selecionado
            $prixs = Prix::where('country', $filter)->paginate(6);
        }




        $countries = Prix::distinct()->pluck('country');

        return view('prix', compact('prixs', 'filter', 'countries'));
    }

    public function show($id){
        $prix = Prix::findOrFail($id);
        return view('prix_show', compact('prix'));
    }
}
