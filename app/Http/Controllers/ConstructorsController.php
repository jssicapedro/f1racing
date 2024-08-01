<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Webpatser\Countries\Countries;

class ConstructorsController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('name')->get();
        return view('teams', compact('teams'));
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);

        $cars = $team->car;

        $drivers = Driver::where('Team_idTeam', $id)
            ->where('mainDriver', 1)
            ->get();

        // Obtém o nome do país do time
        $countryName = $team->country;

        // Busca o país na tabela countries usando o nome
        $country = Countries::where('name', $countryName)->first();

        if ($country) {
            // Obtém o código ISO 3166-2 do país
            $isoCode = $country->iso_3166_2;
    
            // Formata a URL da bandeira com base no código ISO 3166-2
            $flagUrl = "https://flagcdn.com/16x12/" . strtolower($isoCode) . ".png";
    
            // Adiciona a URL da bandeira ao objeto team
            $team->flag_url = $flagUrl;
        } else {
            $team->flag_url = null; // Caso o país não seja encontrado
        }

        return view('team_show', compact('team', 'cars', 'drivers'));
    }

    public function view()
    {
        $teams = Team::paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        // Obtém todos os países da tabela
        $countries = DB::table('countries')->get();
        return view('admin.teams.create', compact('countries'));
    }

    public function store(TeamRequest $request)
    {
        $imgFullName = $imgLogo = $imgTeam = null;

        // Verifica e armazena a imagem de 'imgFullName'
        if ($request->hasFile('imgFullName') && $request->file('imgFullName')->isValid()) {
            $imgFullName = str_replace(' ', '', $request->name) . '_full.' . $request->imgFullName->extension();
            $request->imgFullName->storeAs('team', $imgFullName, 'public');
        }

        // Verifica e armazena a imagem de 'imgLogo'
        if ($request->hasFile('imgLogo') && $request->file('imgLogo')->isValid()) {
            $imgLogo = str_replace(' ', '', $request->name) . '.' . $request->imgLogo->extension();
            $request->imgLogo->storeAs('team', $imgLogo, 'public');
        }

        // Verifica e armazena a imagem de 'imgTeam'
        if ($request->hasFile('imgTeam') && $request->file('imgTeam')->isValid()) {
            $imgTeam = str_replace(' ', '', $request->name) . '_team.' . $request->imgTeam->extension();
            $request->imgTeam->storeAs('team', $imgTeam, 'public');
        }

        // Cria uma nova entrada na tabela 'teams'
        Team::create([
            'name' => $request->input('name'),
            'fullName' => $request->input('fullName'),
            'base' => $request->input('base'),
            'country' => $request->input('country'), // Armazena o nome do país
            'teamChief' => $request->input('teamChief'),
            'technicalChief' => $request->input('technicalChief'),
            'firstTeamEntry' => $request->input('firstTeamEntry'),
            'polePositions' => $request->input('polePositions'),
            'worldChampionShips' => $request->input('worldChampionShips'),
            'color' => $request->input('color'),
            'imgFullName' => $imgFullName,
            'imgLogo' => $imgLogo,
            'imgTeam' => $imgTeam,
        ]);

        return redirect()->route('admin.teams')->with('success', 'Team created successfully.');
    }
}
