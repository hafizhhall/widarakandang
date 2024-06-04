<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Jenis;
use App\Models\Photo;
use App\Models\Supplier;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardKatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.katalog.index',[
            'katalogs' => Katalog::all(),
            'title' => 'katalog'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.katalog.create', [
            'categories' => Jenis::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'title' => 'required|max:100',
            'jenis_id' => 'required',
            'ukuran' => 'required',
            'berbunga' => 'required',
            'suhu' => 'required',
            'status' => 'required',
            'jumlah' => 'nullable',
            'harga' => 'required',
            'body' =>'required',
            'perawatan' => 'required',
            'berat' => 'required',
            'gambar' => 'image|file'
        ]);

        if($request->file('gambar')){
            $validasiData['gambar'] = $request->file('gambar')->store('katalog-gambar');
        }

        if (empty($validasiData['jumlah'])) {
            $validasiData['jumlah'] = 0;
        }

        $validasiData['excerpt'] = Str::limit(strip_tags($request->body), 200);


        Katalog::create($validasiData);
        return redirect('/dashboard/katalog')->with('success','Katalog berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Katalog $katalog)
    {
        return view('dashboard.katalog.show',[
            'katalog' => $katalog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Katalog $katalog)
    {
        return view('dashboard.katalog.edit', [
            'katalog' => $katalog,
            'categories' => Jenis::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Katalog $katalog)
    {
        $rules = [
            'title' => 'required|max:100',
            'jenis_id' => 'required',
            'ukuran' => 'required',
            'berbunga' => 'required',
            'suhu' => 'required',
            'status' => 'required',
            'jumlah' => 'nullable',
            'harga' => 'required',
            'body' =>'required',
            'perawatan' => 'required',
            'berat' => 'required',
            'gambar' => 'image|file|max:5024'
        ];

        if($request->slug != $katalog->slug){
            $rules['slug'] = 'required|unique:katalogs';
        }


        $validasiData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $validasiData['gambar'] = $request->file('gambar')->store('katalog-gambar');
        }

        $validasiData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Katalog::where('id', $katalog->id)->update($validasiData);
        return redirect('/dashboard/katalog')->with('success','Katalog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katalog $katalog)
    {
        if($katalog->gambar){
            Storage::delete($katalog->gambar);
        }

        Katalog::destroy($katalog->id);
        return redirect('/dashboard/katalog')->with('success', 'Sudah terhapus!!!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Katalog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
