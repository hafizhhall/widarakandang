<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Katalog;
use App\Models\Output;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class UserCheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil detail transaksi berdasarkan user ID
        return view('user.order.index', [
            // 'carts' => Cart::where('user_id', Auth::user()->id)->get(),
            'transaksi' => Transaction::where('user_id', Auth::user()->id)->paginate(5),
            'title' => 'order'
        ]);
    }

    public function show(Request $request, $transactionId)
    {
        // Mengambil snapToken dari session
        $snapToken = session('snapToken');

        // Hapus snapToken dari session setelah mengambilnya
        // session()->forget('snapToken');

        $apikey = env('RAJA_ONGKIR_API_KEY');
        $userId = Auth::user()->id;
        // Find the transaction and ensure it belongs to the logged-in user
        $transaction = Transaction::where('id', $transactionId)
            ->where('user_id', $userId)
            ->first();
        if (!$transaction) {
            // If the transaction doesn't exist or doesn't belong to the user, abort with a 404 error
            abort(404, 'Transaction not found or you do not have access to view this transaction.');
        }
        // Get the details for the transaction
        $details = TransactionDetail::where('transaction_id', $transactionId)->get();
        $user = User::find($transaction->user_id);

        $selectedCity = $user->city;
        $beratTotal = 0;
        foreach ($details as $detail) {
            $beratTotal += ($detail->katalog->berat * $detail->qty);
        }


        $responseCost = Http::withHeaders([
            'key' => $apikey
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 501,
            'destination' => $selectedCity,
            'weight' => $beratTotal,
            'courier' => 'jne',
            'costs' => 0
        ]);
        $ongkir = $responseCost['rajaongkir'];
        // dd($ongkir);
        // dd($ongkir);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('user.order.detail', compact('details', 'transaction', 'user', 'selectedCity', 'ongkir', 'snapToken'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $apikey = env('RAJA_ONGKIR_API_KEY');
        // total dari halaman checkout
        $total = intval($request->total);
        $totalBerat = intval($request->totalBerat);

        $user = Auth::user();
        $userId = $user->id;
        // $selectedCity = $user->city;
        // $destination = $user->city_name;

        //ambil shipping address
        $selectedAddressId = $request->input('shipping_address_id');

        if (!$selectedAddressId) {
            Alert::toast('Silahkan pilih alamat pengiriman', 'error');
            return redirect('/chart')->with('error', 'Silahkan pilih alamat pengiriman');
        }
        $selectedAddress = Address::find($selectedAddressId);
        if (!$selectedAddress) {
            Alert::toast('Alamat pengiriman tidak valid', 'error');
            return redirect('/chart')->with('error', 'Alamat pengiriman tidak valid.');
        }
        $selectedCity = $selectedAddress->city;
        $destination = $selectedAddress->city_name;
        $alamat = $selectedAddress->alamat;
        $name = $selectedAddress->name;
        $pos = $selectedAddress->pos;
        $phone = $selectedAddress->phone;
        // Cek apakah ada transaksi yang belum dibayar
        $unpaidTransaction = Transaction::where('user_id', $userId)
            ->where('status', 'belum dibayar') // Sesuaikan dengan status yang Anda gunakan
            ->first();

        if ($unpaidTransaction) {
            // Jika ada transaksi yang belum dibayar, batalkan checkout
            Alert::toast('Anda memiliki transaksi yang belum dibayar', 'error');
            return redirect('/chart')->with('error', 'Anda memiliki transaksi yang belum dibayar.');
        }
        $selectedKurir = $request->input('courier_code');
        $responseCost = Http::withHeaders([
            'key' => $apikey
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 501,
            'destination' => $selectedCity,
            'weight' => $totalBerat,
            'courier' => $selectedKurir,
            'costs' => 0
        ]);
        if ($responseCost->failed() || !isset($responseCost['rajaongkir']['results']) || empty($responseCost['rajaongkir']['results'])) {
            Alert::toast('Gagal menghitung ongkir, coba lagi nanti', 'error');
            return redirect('/chart')->with('error', 'Gagal menghitung ongkir, coba lagi nanti');
        }
        $ongkir = $responseCost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        $kurir = $responseCost['rajaongkir']['results'][0]['name'];
        $origin = $responseCost['rajaongkir']['origin_details']['city_name'];
        $layanan = $responseCost['rajaongkir']['results'][0]['costs'][0]['service'];
        $estimasi = $responseCost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['etd'];
        $carts = Cart::where('user_id', Auth::user()->id);
        $cartUser = $carts->get();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'total' => $total + $ongkir,
            'ongkir' => $ongkir,
            'city_name' => $destination,
            'kurir' => $kurir,
            'origin' => $origin,
            'layanan' => $layanan,
            'estimasi' => $estimasi,
            'berat' => $totalBerat,
            'alamat' => $alamat,
            'pos' => $pos,
            'name' => $name,
            'phone' => $phone
        ]);


        // perulangan untuk cart
        foreach ($cartUser as $cart) {
            $transaction->detail()->create([
                'katalog_id' => $cart->katalog_id,
                'qty' => $cart->qty,
                'sub_total' => $cart->katalog->harga * $cart->qty,
                'harga_anggrek' => $cart->katalog->harga
            ]);

            // Mengurangi jumlah stok katalog
            $katalog = Katalog::find($cart->katalog_id);
            if ($katalog) {
                $katalog->jumlah -= $cart->qty;
                $katalog->save();
            }
            Output::create([
                'katalog_id' => $cart->katalog_id,
                'user_id' => $userId,
                'quantity' => $cart->qty,
                'sub_keluar' => $cart->katalog->harga,
                'harga_keluar' => $cart->katalog->harga * $cart->qty,
                'date' => now() // atau sesuaikan dengan format tanggal yang Anda inginkan
            ]);
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // Generate unique order_id
        // $order_id = $transaction->id;
        $order_id = $transaction->id . '-' . time();
        $gross = $total + $ongkir;
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $gross,
            ),
            'customer_details' => array(
                'name' => $user->name,
                'phone' => $user->no_telep,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // Menyimpan snapToken ke dalam session
        $request->session()->put('snapToken', $snapToken);
        // dd($snapToken);
        // Mail::to($carts->first()->user->email)->send(new CheckoutMail($cartUser));
        Cart::where('user_id', Auth::user()->id)->delete();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return redirect()->route('order.detail', ['transactionId' => $transaction->id]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $transaction = Transaction::find($request->order_id);
                $transaction->update(['status' => 'Lunas']);
            }
        }
    }

    public function generateInvoice(Request $request, $transactionId)
    {
        $userId = Auth::user()->id;
        // Find the transaction and ensure it belongs to the logged-in user
        $transaction = Transaction::where('id', $transactionId)
            ->where('user_id', $userId)
            ->first();
        if (!$transaction) {
            // If the transaction doesn't exist or doesn't belong to the user, abort with a 404 error
            abort(404, 'Transaction not found or you do not have access to view this transaction.');
        }
        // Get the details for the transaction
        $details = TransactionDetail::where('transaction_id', $transactionId)->get();
        $user = User::find($transaction->user_id);

        $data = ['transaction' => $transaction, 'details' => $details];
        $pdf = Pdf::loadView('user.order.cetak-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('inoice WK' . $transaction->id . '-' . $todayDate . '.pdf');
    }

    public function destroy($transactionId)
    {
        $userId = Auth::id();

        $transaction = Transaction::where('id', $transactionId)
            ->where('user_id', $userId)
            ->first();

        if (!$transaction) {
            abort(404, 'Transaksi tidak ditemukan, anda tidak memiliki akses untuk menghapus data ini');
        }

        // Dapatkan semua detail transaksi
        $transactionDetails = TransactionDetail::where('transaction_id', $transactionId)->get();

        // Loop melalui setiap detail transaksi
        foreach ($transactionDetails as $detail) {
            // Hapus data dari tabel Output
            Output::where('katalog_id', $detail->katalog_id)
                ->where('user_id', $userId)
                ->where('quantity', $detail->qty)
                ->where('harga_keluar', $detail->sub_total)
                ->where('created_at', $detail->created_at)
                ->delete();

            // Kembalikan jumlah item ke tabel anggrek
            $anggrek = Katalog::where('id', $detail->katalog_id)->first();
            if ($anggrek) {
                $anggrek->jumlah += $detail->qty; // Sesuaikan field jumlah sesuai dengan skema tabel anggrek Anda
                $anggrek->save();
            }
        }
        TransactionDetail::where('transaction_id', $transactionId)->delete();

        $transaction->delete();
        Alert::toast('Transaksi berhasil dihapus', 'success');
        return redirect()->route('order.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
