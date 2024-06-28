<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Alamat!';
        $text = "Apakah kamu yakin akan menghapus alamat ini?";
        confirmDelete($title, $text);
        $data['address'] = Address::where('user_id', Auth::user()->id)->get();
        return view('user.address.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apikey = env('RAJA_ONGKIR_API_KEY');
        $response = Http::withHeaders([
            'key' => $apikey
        ])->get('https://api.rajaongkir.com/starter/city');
        $data['cities'] = $response['rajaongkir']['results'];
        return view('user.address.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'name' => 'required|max:100',
            'alamat' => 'required',
            'pos' => 'required',
            'phone' => 'required',
            'city_name' => 'required',
            'city' => 'required',
        ]);
        // $rules['user_id'] = auth()->user()->id;
        $validasiData['user_id'] = auth()->user()->id;
        Alert::toast('Berhasil tambah alamat', 'success');
        Address::create($validasiData);
        return redirect('/user/address')->with('success', 'Alamat berhasil diubah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        $apikey = env('RAJA_ONGKIR_API_KEY');
        $response = Http::withHeaders([
            'key' => $apikey
        ])->get('https://api.rajaongkir.com/starter/city');
        $data['cities'] = $response['rajaongkir']['results'];
        $data['address'] = $address;

        return view('user.address.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $rules = [
            'name' => 'required|max:100',
            'alamat' => 'required',
            'pos' => 'required',
            'phone' => 'required',
            'city_name' => 'required',
            'city' => 'required'
        ];
        $validasiData = $request->validate($rules);

        Address::where('id', $address->id)
                ->update($validasiData);
        return redirect('/user/address')->with('success', 'Alamat berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        Address::destroy($address->id);
        return redirect('/user/address');
    }
}
