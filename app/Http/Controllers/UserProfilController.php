<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.profil.index', [
            "title" => "user",
            'user' => $user
        ]);
    }

    public function ediPorfil()
    {
        $user = Auth::user();
        return view('user.profil.change-profil',[
            'user' => $user
        ]);
    }

    public function processEditProfil(Request $request)
    {
        $request->validate([
            'name' =>'max:255',
            'email' =>'email:dns|unique:users,email,'.Auth::user()->id,
            'no_telep' => 'nullable|max:14',
            'jenis_kelamin' => 'max:50'
        ]);
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_telep' => $request->no_telep,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        Alert::success('Success', 'Data diri berhasil diubah');
        return redirect('/user');
    }

    public function editPassword()
    {
        $user = Auth::user();
        return view('user.profil.change-password', [
            'user' => $user
        ]);
    }

    public function processChangePassword(Request $request)
    {

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'old password is incorrect');
        }

        if ($request->new_password != $request->repeat_password) {
            return back()->with('error', 'new password is incorrect');
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password)

        ]);
        Alert::success('Success', 'Password berhasil diubah');
        return back();
    }

    public function addAddress()
    {
        $user = Auth::user();
        $apikey = env('RAJA_ONGKIR_API_KEY');
        $response = Http::withHeaders([
            'key' => $apikey
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];

        return view('user.profil.change-address', [
            'user' => $user,
            'cities' => $cities
        ]);
    }

    public function processAddAddress(Request $request)
    {
        $request->validate([
            'alamat' =>'required|string|max:255',
            'pos' => 'required|string|regex:/^\d{5}$/'
        ]);

        $user = Auth::user();
        $user->update([
            'city' => $request->city,
            'alamat' => $request->alamat,
            'pos' => $request->pos,
            'city_name' => $request->city_name
        ]);
        return redirect('/user');
    }
}
