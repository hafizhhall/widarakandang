<?php

namespace App\Http\Controllers;
use App\Models\Informasi;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(){
        return view('informasi', [
            "title" => "Informasi",
            "informasi" => Informasi::all()
        ]);
    }

    public function show($slug){
        return view('informasi',[
            "title" => "Single Post",
            "informasi" => Informasi::find($slug)
        ]);
}
}
