<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.jenis.index', [
            'jenis' => Jenis::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiJenis = $request->validate([
            'name' => 'required|max:50'
        ]);
        Jenis::create($validasiJenis);
        return redirect('/dashboard/jenis')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        return view('dashboard.jenis.edit',[
            'jenis'=>$jenis
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis $jenis)
    {
        $rules =[
            'name' => 'required|max:100'
        ];

        if($request->slug != $jenis->slug){
            $rules['slug'] = 'required|unique:jenis';
        }
        $validasiData = $request->validate($rules);

        Jenis::where('id', $jenis->id)->update($validasiData);
        return redirect()->route('jenis.index')->with('success', 'Kategori berhasil diubah');
        // return redirect('/dashboard/jenis')->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jenis)
    {

        Jenis::destroy($jenis->id);
        return redirect('/dashboard/jenis')->with('success', 'Sudah terhapus!!!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Jenis::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
