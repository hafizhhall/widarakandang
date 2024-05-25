<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katalog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJumlahAnggrek = Katalog::sum('jumlah');
        return view('dashboard.index', [
            'jumlah' => $totalJumlahAnggrek,
            'title' => 'dashboard'
        ]);
    }

}
