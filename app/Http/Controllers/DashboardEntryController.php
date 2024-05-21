<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Katalog;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkMasuk = Entry::with([
            'katalog' => function($query){
                $query->select('id', 'title');
            },
            'supplier' => function($query){
                $query->select('id', 'perusahaan');
            },
            'user' => function($query){
                $query->select('id', 'name');
            }
        ])->where('user_id', auth()->user()->id)->get();
        return view('dashboard.entry.index', [
            'produkMasuk' => $produkMasuk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.entry.create', [
            'suppliers' => Supplier::all(),
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
            'quantity' => ['required'],
            'katalog_id' => ['required'],
            'supplier_id' => ['required']
        ]);
        // $created['user_id'] = auth()->user()->id;
        $created = Entry::create([
            'katalog_id' => $request->katalog_id,
            'supplier_id' => $request->supplier_id,
            'user_id' => 1,
            'date' => $request->date,
            'quantity' => $request->quantity
        ]);

        // $sumIncomeQuantity = Entry::where('katalog_id', $request->katalog_id)->sum('quantity');
        // $sumOutcomeQuantity = Entry::where('type', 'outcome')->where('product_id', $request->product_id)->sum('quantity');
        $product = Katalog::findOrFail($request->katalog_id);
        $quantityUpdated = $product->update([
            'jumlah' => $product->jumlah + $request->quantity
        ]);

        if ($created && $quantityUpdated) {
            return redirect('/dashboard/entry')->with('success', 'data berhasil ditambahkan');
        }else{
            return redirect('/dashboard/entry')->with('error', 'Gagal menambahkan data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entry $entry)
    {
        return view('dashboard.entry.edit',[
            'entry' => $entry,
            'katalogs' => Katalog::select('id','title')->get(),
            'suppliers' => Supplier::select('id','perusahaan')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entry $entry)
    {
        $entry = Entry::findOrFail($entry->id);
        $katalog = Katalog::findOrFail($entry->katalog_id);
        $rules =[
            'katalog_id' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required',
            'date' => 'required'

        ];
        $validData = $request->validate($rules);

        // $updateEntry = $validasiData['quantity'];
        $updateEntryQuantity = $validData['quantity'];
        $currentyKatalogJumlah = $katalog->jumlah;
        $updatedKatalogJumlah = $currentyKatalogJumlah + ($updateEntryQuantity - $entry->quantity);

        DB::transaction(function () use ($entry, $validData, $updatedKatalogJumlah, $katalog) {
            // Update the entry
            $entry->update($validData);

            // Update the katalog
            $katalog->update(['jumlah' => $updatedKatalogJumlah]);
        });

        return redirect('/dashboard/entry')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entry $entry)
    {
        //
    }


}
