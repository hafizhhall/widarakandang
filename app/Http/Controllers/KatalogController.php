<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Jenis;
use Illuminate\Http\Request;

class KatalogController extends Controller
{

    public function index(Request $request)
    {
        $query = Katalog::latest()->filter($request->only('search'));
        $jenis = Jenis::all();

        if ($request->ajax()) {
            $katalog_anggrek = $query->paginate(9)->withQueryString();

            // Mengembalikan view khusus untuk AJAX
            return view('katalog.partials.results', compact('katalog_anggrek'))->render();
        }

        // Untuk request biasa (non-AJAX)
        $katalog_anggrek = $query->paginate(9)->withQueryString();

        return view('katalog', [
            "title" => "Katalog",
            "katalog_anggrek" => $katalog_anggrek,
            "jenis" => $jenis
        ]);
    }

    public function show(Katalog $katalog)
    {
        return view('katalogs', [
            "title" => "Single Post",
            "katalog" => $katalog
        ]);
    }

    public function katalog_filter(Jenis $jenis)
    {
        return view('katalog', [
            "title" => "Katalog",
            "katalog_anggrek" => $jenis->Katalog()->get(),
            "jenis" => Jenis::all()
        ]);
    }
}
