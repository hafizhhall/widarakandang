<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use function Laravel\Prompts\confirm;

class DashboardArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        return view('dashboard.artikel.index',[
            'artikels' => Artikel::where('user_id', auth()->user()->id)->get(),
            'title' => 'artikel'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artikel.create', [
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'title' => 'required|max:200',
            'kategori_id' => 'required',
            'gambar' => 'image|file|max:5024',
            'body' => 'required'
        ]);

        if($request->file('gambar')){
            $validasiData['gambar'] = $request->file('gambar')->store('artikel-gambar');
        }

        $validasiData['user_id'] = auth()->user()->id;
        $validasiData['minibody'] = Str::limit(strip_tags($request->body), 200);
        Alert::toast('Berhasil tambah data', 'success');
        Artikel::create($validasiData);
        return redirect('/dashboard/artikel')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        return view('dashboard.artikel.show', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        return view('dashboard.artikel.edit', [
            'artikel' => $artikel,
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $rules = [
            'title' => 'required|max:100',
            'kategori_id' => 'required',
            'body' => 'required',
            'gambar' => 'image|file|max:5024',
        ];

        if($request->slug != $artikel->slug){
            $rules['slug'] = 'required|unique:artikels';
        }

        $validasiData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $validasiData['gambar'] = $request->file('gambar')->store('artikel-gambar');
        }

        $validasiData['user_id'] = auth()->user()->id;
        $validasiData['minibody'] = Str::limit(strip_tags($request->body), 200);

        Artikel::where('id', $artikel->id)
                ->update($validasiData);
        return redirect('/dashboard/artikel')->with('success', 'Artikel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        if($artikel->gambar){
            Storage::delete($artikel->gambar);
        }

        Artikel::destroy($artikel->id);
        return redirect('/dashboard/artikel')->with('success', 'Sudah terhapus!!!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Artikel::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
