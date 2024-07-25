<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Katalog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class UserChartController extends Controller
{
    public function index()
    {
        $apikey = env('RAJA_ONGKIR_API_KEY');
        $response = Http::withHeaders([
            'key' => $apikey
        ])->get('https://api.rajaongkir.com/starter/city');
        $data['cities'] = $response['rajaongkir']['results'];
        $data['charts'] = Cart::where('user_id', Auth::user()->id)->get();
        $data['address'] = Address::where('user_id', Auth::user()->id)->get();
        return view('user.chart.index', $data);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->addresses->isEmpty()) {
            Alert::toast('Lengkapi alamat pengiriman Anda terlebih dahulu', 'error');
            return redirect('/user/address')->with('error', 'Anda harus melengkapi alamat pengiriman terlebih dahulu.');
        }
        // Cek apakah `katalog_id` ada di request
        if (!$request->has('katalog_id')) {
            Alert::toast('Produk tidak tersedia()', 'error');
            return redirect('/katalog')->with('error', 'Stok anggrek habis');
        }
        $katalog = Katalog::find($request->katalog_id);
        if (!$katalog || $katalog->jumlah == 0) {
            Alert::toast('Produk tidak tersedia', 'error');
            return redirect('/katalog')->with('error', 'Stok anggrek habis');
        }

        // validasi untuk produk yang sama
        $duplicate = Cart::where('katalog_id', $request->katalog_id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if ($duplicate) {
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
            'qty' => $request->quantity,
        ]);
        return response()->json([
            'success' => true
        ], 200);
    }
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect('/chart')->with('success', 'Item berhasil dihapus');
    }

    public function updateShippingAddress(Request $request)
    {
        // dd($request->all()); // Tambahkan ini untuk debugging
        $userId = Auth::id();

        if ($request->shipping_address_id == 'new') {
            $request->validate([
                'new_alamat' => 'required|string|max:225',
                'city' => 'required',
                'new_pos' => 'required|digits:5',
                'new_phone' => 'required|regex:/^[0-9]{10,15}$/',
                'new_name' => 'required|string|max:100',
            ]);

            $cityName = $request->input('city_name'); // Ambil nama kota dari input hidden

            $address = Address::create([
                'user_id' => $userId,
                'alamat' => $request->new_alamat,
                'city_name' => $cityName,
                'city' => $request->city,
                'pos' => $request->new_pos,
                'phone' => $request->new_phone,
                'name' => $request->new_name,
            ]);

            session(['shipping_address_id' => $address->id]);
        } else {
            session(['shipping_address_id' => $request->shipping_address_id]);
        }
        return redirect('/chart');
    }
}
