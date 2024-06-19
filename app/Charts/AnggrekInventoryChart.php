<?php

namespace App\Charts;

use App\Models\Jenis;
use App\Models\Katalog;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class AnggrekInventoryChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Array untuk menyimpan data
        $dataJenis = [];
        $dataJumlah = [];

        // Ambil jenis anggrek dan jumlah katalog per jenis anggrek
        $jenisAnggrek = Jenis::pluck('name', 'id');

        foreach ($jenisAnggrek as $jenisId => $jenisNama) {
            $jumlahKatalog = Katalog::where('jenis_id', $jenisId)
                ->sum('jumlah');

            $dataJenis[] = $jenisNama; // Menyimpan nama jenis anggrek
            $dataJumlah[] = $jumlahKatalog; // Menyimpan jumlah katalog per jenis anggrek
        }

        // Membuat chart
        return $this->chart->barChart()
            ->setTitle('Jumlah Anggrek per Jenis')
            ->setSubtitle('Total jumlah per jenis anggrek')
            ->addData('Jumlah Anggrek', $dataJumlah)
            ->setHeight(280)
            ->setXAxis($dataJenis);
    }
}
