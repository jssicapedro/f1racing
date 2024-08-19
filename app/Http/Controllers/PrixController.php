<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrixRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Exception;
use App\Models\Prix;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

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

        $countries = Prix::distinct()->orderBy('country', 'asc')->pluck('country');

        return view('prix', compact('prixs', 'filter', 'countries'));
    }

    public function show($id)
    {
        $prix = Prix::findOrFail($id);
        return view('prix_show', compact('prix'));
    }

    public function view()
    {
        $prixs = Prix::paginate(10);
        return view('admin.prix.index', compact('prixs'));
    }

    public function create()
    {
        // Obtém todos os países da tabela
        $countries = DB::table('countries')->get();
        return view('admin.prix.create', compact('countries'));
    }

    private function resizeImage($file, $width, $height, $destination)
    {
        list($originalWidth, $originalHeight, $imageType) = getimagesize($file);
        
        // Cria uma imagem de acordo com o tipo
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $src = imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_PNG:
                $src = imagecreatefrompng($file);
                break;
            default:
                throw new Exception('Formato de imagem não suportado');
        }

        $dst = imagecreatetruecolor($width, $height);

        // Mantém a transparência para PNG
        if ($imageType == IMAGETYPE_PNG) {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
            imagefilledrectangle($dst, 0, 0, $width, $height, $transparent);
        }

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

        // Salva a imagem de acordo com o tipo
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                imagejpeg($dst, $destination);
                break;
            case IMAGETYPE_PNG:
                imagepng($dst, $destination);
                break;
        }

        imagedestroy($src);
        imagedestroy($dst);
    }

    public function store(PrixRequest $request)
    {

        $imgCircutsName = $imgBannerName = $imgAboutName = null;

        if ($request->hasFile('imgCircuts') && $request->file('imgCircuts')->isValid()) {
            $imgCircutsName = str_replace(' ', '', $request->name) . '.' . $request->imgCircuts->extension();
            $request->imgCircuts->storeAs('prix', $imgCircutsName, 'public');
        }

        if ($request->hasFile('imgBanner') && $request->file('imgBanner')->isValid()) {
            $imgBannerName = str_replace(' ', '', $request->name) . '_banner.' . $request->imgBanner->extension();
            $destinationPath = storage_path('app/public/prix/' . $imgBannerName);
            $this->resizeImage($request->file('imgBanner')->getRealPath(), 900, 506, $destinationPath);
        }

        if ($request->hasFile('imgAbout') && $request->file('imgAbout')->isValid()) {
            $imgAboutName = str_replace(' ', '', $request->name) . '_about.' . $request->imgAbout->extension();
            $request->imgAbout->storeAs('prix', $imgAboutName, 'public');
        }



        Prix::create([
            'name' => $request->name,
            'grandPrixName' => $request->grandPrixName,
            'comunName' => $request->comunName,
            'country' => $request->country,
            'firstGrandPrix' => $request->firstGrandPrix,
            'distance' => $request->distance,
            'length' => $request->length,
            'laps' => $request->laps,
            'info' => $request->info,
            'imgCircuts' => $imgCircutsName ?? null,
            'imgBanner' => $imgBannerName ?? null,
            'imgAbout' => $imgAboutName ?? null,
        ]);

        return redirect()->route('admin.track')->with('success', 'Grand Prix created successfully.');
    }

    public function edit($id)
    {
        $prix = Prix::findOrFail($id);

        return view('admin.prix.edit', compact('prix'));
    }

    public function update(PrixRequest $request, $id)
    {
        $prix = Prix::findOrFail($id);

        $imgCircutsName = $prix->imgCircuts;
        $imgBannerName = $prix->imgBanner;
        $imgAboutName = $prix->imgAbout;

        // Processamento da imagem do banner com redimensionamento
        if ($request->hasFile('imgBanner') && $request->file('imgBanner')->isValid()) {
            if ($prix->imgBanner) {
                Storage::disk('public')->delete('prix/' . $prix->imgBanner);
            }

            $imgBannerFile = $request->file('imgBanner');
            $imgBannerName = str_replace(' ', '', $request->name) . '_banner.' . $imgBannerFile->extension();
            $destinationPath = storage_path('app/public/prix/' . $imgBannerName);
            $this->resizeImage($imgBannerFile->getRealPath(), 900, 506, $destinationPath);
        }

        // Processamento das demais imagens sem redimensionamento
        if ($request->hasFile('imgCircuts') && $request->file('imgCircuts')->isValid()) {
            if ($prix->imgCircuts) {
                Storage::disk('public')->delete('prix/' . $prix->imgCircuts);
            }

            $imgCircutsName = str_replace(' ', '', $request->name) . '.' . $request->imgCircuts->extension();
            $request->imgCircuts->storeAs('prix', $imgCircutsName, 'public');
        }

        if ($request->hasFile('imgAbout') && $request->file('imgAbout')->isValid()) {
            if ($prix->imgAbout) {
                Storage::disk('public')->delete('prix/' . $prix->imgAbout);
            }

            $imgAboutName = str_replace(' ', '', $request->name) . '_about.' . $request->imgAbout->extension();
            $request->imgAbout->storeAs('prix', $imgAboutName, 'public');
        }

        $prix->update([
            'name' => $request->name,
            'grandPrixName' => $request->grandPrixName,
            'comunName' => $request->comunName,
            'country' => $request->country,
            'firstGrandPrix' => $request->firstGrandPrix,
            'distance' => $request->distance,
            'length' => $request->length,
            'laps' => $request->laps,
            'info' => $request->info,
            'imgCircuts' => $imgCircutsName,
            'imgBanner' => $imgBannerName,
            'imgAbout' => $imgAboutName,
        ]);

        return redirect()->route('admin.track')->with('success', 'Grand Prix updated successfully.');
    }

    public function destroy($id)
    {
        $track = Prix::find($id);

        if (!$track) {
            return redirect()->route('admin.track')->with('error', 'Result not found.');
        }

        $track->delete();

        return redirect()->route('admin.track')->with('success', 'Event delete successfully.');
    }
}
