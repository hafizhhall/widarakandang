<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserChartController extends Controller
{
    public function index(){
        $charts = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.chart.index', compact('charts'));
    }

    public function store(Request $request)
    {
        // validasi untuk produk yang sama
        $duplicate = Cart::where('katalog_id', $request->katalog_id)->first();
        if($duplicate){
            Alert::toast('Barang sudah tersedia di keranjang', 'error');
            return redirect('/chart')->with('error', 'Barang sudah ada dikeranjang');
        }
        Cart::create([
            'user_id' => Auth::user()->id,
            'katalog_id' => $request->katalog_id,
            'qty' => 1

        ]);
        Alert::toast('Berhasil tambah anggrek', 'success');
        return redirect('/chart')->with('success', 'Berhasil tambah barang');
    }
    public function update(Request $request, $id)
    {
        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);
        return response()->json([
            'success' => true
        ], 200);
    }
    public function destroy($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect('/chart')->with('success', 'Item berhasil dihapus');
    }

}
