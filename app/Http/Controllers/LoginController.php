<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {

        // Validasi CAPTCHA terlebih dahulu
        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['captcha' => 'Captcha tidak valid.'])->withInput();
        }

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
            // 'captcha' => 'required|captcha'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'pemilik') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Alert::toast('Password atau Email Salah!', 'error');
        return back()->with('loginError', 'Masuk gagal');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
