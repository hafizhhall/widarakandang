<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Katalog;
use App\Models\Supplier;
use App\Models\Output;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardOutputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkKeluar = Output::with([
            'katalog' => function($query){
                $query->select('id', 'title', 'harga');
            },
            'user' => function($query){
                $query->select('id', 'name');
            }
        ])->where('user_id', auth()->user()->id)->get();

        return view('dashboard.output.index',[
            'produkKeluar' => $produkKeluar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.output.create', [
            'katalogs' => Katalog::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => ['required'],
            'katalog_id' => ['required'],
            'quantity' => ['required'],
            // 'harga_keluar' => ['required']
        ]);
        $katalog = Katalog::findOrFail($request->katalog_id);
        $stokTersedia = $katalog->jumlah - $request->quantity;
        if ($stokTersedia < 0) {
            return redirect('/dashboard/output')->with('error', 'Jumlah anggrek tidak mencukupi');
        }else{
        $harga_keluar = $katalog->harga * $request->quantity;
            $created = Output::create([
                'katalog_id' => $request->katalog_id,
                'user_id' => 1,
                'date' => $request->date,
                'quantity' => $request->quantity,
                'sub_keluar' => $katalog->harga,
                'harga_keluar' => $harga_keluar
            ]);

            // $sumOutputQuantity = Output::where('katalog_id', $request->katalog_id)->sum('quantity');

            $quantityUpdated = $katalog->update([
                'jumlah' => $stokTersedia
            ]);
            if($created && $quantityUpdated){
                return redirect('/dashboard/output')->with('success', 'Data berhasil ditambahkan');
            } else{
                return redirect('/dashboard/output')->with('error', 'Gagal menambahkan data');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Output $output)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Output $output)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Output $output)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Output $output)
    {
        //
    }
}
