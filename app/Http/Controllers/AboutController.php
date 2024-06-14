<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(){
        return view('blog', [
            "title" => "Blog",
            "artikel" => Artikel::latest()->paginate(9)->withQueryString(),
            "kategori" => Kategori::all()
        ]);
    }
    public function artikel_kategori(Kategori $kategori)
    {
        return view('blog', [
            "title" => "Blog",
            "artikel" => $kategori->Artikel()->paginate(9),
            "kategori" => Kategori::all()
        ]);
        // $artikelall = $kategori->Artikel()->get();
        // return $artikelall;
    }
    public function show(Artikel $dartikel)
    {
        return view('/dartikel', [
            "title" => "Single Post",
            "artikel" => $dartikel
        ]);
    }
}
