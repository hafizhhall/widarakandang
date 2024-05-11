<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori.index',[
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiKategori = $request->validate([
            'nama' => 'required|max:50',
            // 'slug' => 'required|unique:kategori'
        ]);

        Kategori::create($validasiKategori);
        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/dashboard/kategori')->with('success', 'Sudah terhapus!!!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
