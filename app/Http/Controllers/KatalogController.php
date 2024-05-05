<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Jenis;
class KatalogController extends Controller
{

    public function index(){
        return view('katalog', [
            "title" => "Katalog",
            "katalog_anggrek" => Katalog::latest()->filter(request(['search']))->paginate(9)->withQueryString(),
            "jenis" => Jenis::all()
        ]);
    }

    public function show(Katalog $katalog){
        return view('katalogs',[
            "title" => "Single Post",
            "katalog" => $katalog
        ]);
    }

    public function katalog_filter(Jenis $jenis){
        return view ('katalog',[
            "title" => "Katalog",
            "katalog_anggrek" => $jenis->Katalog()->get(),
            "jenis" => Jenis::all()
        ]);
    }
}
