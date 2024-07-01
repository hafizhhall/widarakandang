<?php

namespace App\Http\Controllers;

use App\Charts\AnggrekInventoryChart;
use App\Charts\InventoryEntryChart;
use App\Charts\SupplierChart;
use App\Charts\TransactionChart;
use App\Models\Entry;
use Illuminate\Http\Request;
use App\Models\Katalog;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(TransactionChart $chart, AnggrekInventoryChart $inventorychart, InventoryEntryChart $inventoryentry, SupplierChart $supplierChart)
    {
        $tahun = date('Y');
        $bulan = date('m');

        for ($i = 1; $i <= $bulan; $i++) {
            $totalTransaksi = Transaction::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i)
                ->where('status', 'lunas')
                ->sum('total');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalTransaksi[] = $totalTransaksi;
        }
        $data['dataBulan'] = $dataBulan;
        $data['dataTotalTransaksi'] = $dataTotalTransaksi;
        $data['inventoryentry'] = $inventoryentry->build();
        $data['chart'] = $chart->build();
        $data['inventorychart'] = $inventorychart->build();
        $data['supplierChart'] = $supplierChart->build();
        // $totalJumlahAnggrek = Katalog::sum('jumlah');
        $data['totalJumlahAnggrek'] = Katalog::sum('jumlah');
        // $totalPendapatan = Transaction::sum('total');
        $data['totalPendapatan'] = Transaction::sum('total');

        // Mendapatkan bulan dan tahun saat ini
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Menghitung total pendapatan untuk bulan saat ini
        $data['transactionByMonth'] = Transaction::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total');
        $data['entryByMonth'] = Entry::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('quantity');
        $data['bulanini'] = Carbon::now()->locale('id')->translatedFormat('F');

        return view('dashboard.index', $data);
    }
}
