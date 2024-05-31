<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserCheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $carts = Cart::where('user_id', Auth::user()->id);
        $cartUser = $carts->get();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);

        foreach ($cartUser as $cart){
            $transaction->detail()->create([
                'katalog_id' => $cart->katalog_id,
                'qty' => $cart->qty
            ]);
        }
        // Mail::to($carts->first()->user->email)->send(new CheckoutMail($cartUser));
        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect('/');
    }
}
