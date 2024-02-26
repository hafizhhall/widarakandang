<?php

namespace App\Http\Controllers;
use App\Models\Artikel;

class HomeController extends Controller
{
    public function index(){
        return view('home', [

            "title" => "Home",
            "artikel" => Artikel::all()
        ]);
    }

    public function show($slug){
        return view('/dartikel',[
            "title" => "Single Post",
            "artikel" => Artikel::find($slug)
        ]);
}
}
