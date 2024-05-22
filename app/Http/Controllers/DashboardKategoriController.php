<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(auth()->guest()){
        //     abort(403);
        // }

        // if(auth()->user()->name !== 'banyu adem'){
        //     abort(403);
        // }
        return view('dashboard.kategori.index',[
            'kategoris' => Kategori::all()
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
        return view('dashboard.kategori.edit',[
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'nama' => 'required|max:100'
        ];

        if($request->slug != $kategori->slug){
            $rules['slug'] = 'required|unique:kategoris';
        }
        $validasiData = $request->validate($rules);


        Kategori::where('id', $kategori->id)
                    ->update($validasiData);
        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {

        // Kategori::findOrFail($kategori->id);
        if($kategori->artikel()->count() > 0){
            return redirect('dashboard/kategori')->with('error', 'Kategori tidak bisa dihapus karena masih memiliki artikel terkait.');
        }
        $kategori->delete();
        return redirect('/dashboard/kategori')->with('success', 'Sudah terhapus!!!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
