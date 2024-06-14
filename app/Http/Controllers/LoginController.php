<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 'admin' || Auth::user()->role == 'pemilik'){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
            }
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Alert::toast('Password atau Email Salah!', 'error');
        return back()->with('loginError', 'Masuk gagal');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
