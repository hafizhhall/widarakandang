<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            "title" => "Home",
            "artikel" => Artikel::all(),
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
            "artikel" => $kategori->Artikel()->get(),
            "kategori" => Kategori::all()
        ]);
        // $artikelall = $kategori->Artikel()->get();
        // return $artikelall;
    }
}
