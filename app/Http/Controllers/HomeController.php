<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            "title" => "Home",
            // "artikel" => Artikel::all(),
            "artikel" => Artikel::latest()->paginate(9)->withQueryString(),
            "kategori" => Kategori::all()
        ]);
    }

    public function show(Artikel $dartikel){
        return view('/dartikel',[
            "title" => "Single Post",
            "artikel" => $dartikel
        ]);
}

    public function artikel_kategori(Kategori $kategori){
        return view('home', [
            "title" => "Home",
            "artikel" => $kategori->Artikel()->paginate(9),
            "kategori" => Kategori::all()
        ]);
        // $artikelall = $kategori->Artikel()->get();
        // return $artikelall;
    }
}
