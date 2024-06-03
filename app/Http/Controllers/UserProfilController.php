<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'no_telep' => 'nullable|max:14'
        ]);
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_telep' => $request->no_telep
        ]);
        Alert::success('Success', 'Data diri berhasil diubah');
        return back();
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
}
