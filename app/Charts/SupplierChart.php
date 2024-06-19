<?php

namespace App\Charts;

use App\Models\Entry;
use App\Models\Supplier;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SupplierChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Array untuk menyimpan data
        $dataSupplier = [];
        $dataJumlah = [];

        // Ambil jenis anggrek dan jumlah katalog per jenis anggrek
        $supplier = Supplier::pluck('perusahaan', 'id');

        foreach ($supplier as $supplierId => $supplierName) {
            $jumlahEntry = Entry::where('supplier_id', $supplierId)
                ->sum('quantity');

            $dataSupplier[] = $supplierName; // Menyimpan nama jenis anggrek
            $dataJumlah[] = $jumlahEntry; // Menyimpan jumlah katalog per jenis anggrek
        }

        // Membuat chart
        return $this->chart->barChart()
            ->setTitle('Jumlah Anggrek Masuk By Supplier')
            ->setSubtitle('Total jumlah per Supplier')
            ->addData('Jumlah Anggrek', $dataJumlah)
            ->setHeight(280)
            ->setXAxis($dataSupplier);
    }
}
