<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Jenis;
use App\Models\Katalog;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "Home",
            // "artikel" => Artikel::all(),
            "artikel" => Artikel::latest()->take(6)->get(),
            "kategori" => Kategori::all(),
            "katalog_anggrek" => Katalog::latest()->take(8)->get(),
            "jenis" => Jenis::all()
        ]);
    }

    public function show(Artikel $dartikel)
    {
        return view('/dartikel', [
            "title" => "Single Post",
            "artikel" => $dartikel
        ]);
    }

    public function search(Request $request)
    {
        $request = Artikel::search(
            keyword: $request->keyword,
            columns: ["id", "title"]
        )->get();

        return view('home', $request);
    }
}
