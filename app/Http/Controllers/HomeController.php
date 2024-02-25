<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home',[
            "title" => "Artikel",
            "artikel" => Artikel::all()
        ]);
    }

    public function show($slug){
        return view('home',[
            "title" => "Single Post",
            "artikel" => Artikel::find($slug)
        ]);
}
}
