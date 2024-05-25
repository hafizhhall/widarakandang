<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.supplier.index', [
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'perusahaan' =>'required|max:100',
            'nama' => 'required|max:50',
            'phone' => 'required|max:15',
            'note' => 'nullable|string'
        ]);

        if (empty($validasiData['note'])) {
            $validasiData['note'] = '-';
        }

        Supplier::create($validasiData);
        return redirect('/dashboard/supplier')->with('success', 'Supplier berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('dashboard.supplier.edit', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'perusahaan' =>'required|max:100',
            'nama' => 'required|max:50',
            'phone' => 'required|max:15',
            'note' => 'nullable'
        ];
        if($request->slug != $supplier->slug){
            $rules['slug'] = 'required|unique:suppliers';
        }
        $validasiData = $request->validate($rules);

        Supplier::where('id', $supplier->id)
                    ->update($validasiData);

        return redirect('/dashboard/supplier')->with('success', 'Kategori berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        // Supplier::destroy($supplier->id);
        // return redirect('dashboard/supplier')->with('success', 'Sudah terhapus!!!');
        // if($supplier->katalog()->count() > 0){
        //     return redirect('dashboard/supplier')->with('error', 'Kategori tidak bisa dihapus karena masih memiliki katalog terkait.');
        // }

        $supplier->delete();
        return redirect('/dashboard/supplier')->with('success', 'Sudah terhapus!!!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Supplier::class, 'slug', $request->perusahaan);
        return response()->json(['slug' => $slug]);
    }
}
