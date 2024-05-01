<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katalog;
class KatalogController extends Controller
{
    //
    public function index(){
        return view('katalog', [
            "title" => "Katalog",
            "katalog_anggrek" => Katalog::all()
        ]);
    }

    public function show(Katalog $katalog){
        return view('katalogs',[
            "title" => "Single Post",
            "katalog" => $katalog
        ]);
    }
}
