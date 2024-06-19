<?php

namespace App\Charts;

use App\Models\Entry;
use App\Models\Katalog;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class InventoryEntryChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahun = date('Y');
        $bulanSekarang = date('m');

        $dataBulan = [];
        $dataJumlah = [];

        for ($i = 1; $i <= $bulanSekarang; $i++) {
            $jumlahKatalog = Entry::whereYear('date', $tahun)
                ->whereMonth('date', $i)
                ->sum('quantity');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataJumlah[] = $jumlahKatalog;
        }

        return $this->chart->barChart()
            ->setTitle('Jumlah Anggrek Masuk per Bulan')
            ->setSubtitle('Total anggrek yang masuk selama tahun ' . $tahun)
            ->addData('Jumlah Anggrek Masuk', $dataJumlah)
            ->setHeight(280)
            ->setXAxis($dataBulan);
    }
}
