<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

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
            'transaksi' => Transaction::where('user_id', Auth::user()->id)->get(),
            'title' => 'order'
        ]);
    }

    public function show(Request $request, $transactionId)
    {
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
            'origin' => 39,
            'destination' => $selectedCity,
            'weight' => $beratTotal,
            'courier' => 'jne',
            'costs' => 0
        ]);
        $ongkir = $responseCost['rajaongkir'];
        // dd($ongkir);
        // dd($ongkir);
        return view('user.order.detail', [
            'details' => $details,
            'transaction' => $transaction,
            'user' => $user,
            'selectedCity' => $selectedCity,
            'ongkir' => $ongkir
        ]);
    }
    public function store(Request $request)
    {
        $total = intval($request->total);

        $userId = Auth::user()->id;

        // Cek apakah ada transaksi yang belum dibayar
        $unpaidTransaction = Transaction::where('user_id', $userId)
            ->where('status', 'belum dibayar') // Sesuaikan dengan status yang Anda gunakan
            ->first();

        if ($unpaidTransaction) {
            // Jika ada transaksi yang belum dibayar, batalkan checkout
            Alert::toast('Anda memiliki transaksi yang belum dibayar', 'error');
            return redirect('/chart')->with('error', 'Anda memiliki transaksi yang belum dibayar.');
        }

        $carts = Cart::where('user_id', Auth::user()->id);
        $cartUser = $carts->get();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'total' => $total
        ]);

        foreach ($cartUser as $cart) {
            $transaction->detail()->create([
                'katalog_id' => $cart->katalog_id,
                'qty' => $cart->qty,
                'sub_total' => $cart->katalog->harga * $cart->qty
            ]);
        }
        // Mail::to($carts->first()->user->email)->send(new CheckoutMail($cartUser));
        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect('/order');
    }
}
