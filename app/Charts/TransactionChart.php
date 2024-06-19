<?php

namespace App\Charts;

use App\Models\Transaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class TransactionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');

        for($i = 1; $i <= $bulan; $i++){
            $totalTransaksi = Transaction::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $i)
            ->sum('total');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalTransaksi[] = $totalTransaksi;
        }
        return $this->chart->lineChart()
            ->setTitle('Data Penjualan Anggrek Per Bulanan')
            ->setSubtitle('Grafik penjualan selama satu tahun')
            ->addData('Total transaksi', $dataTotalTransaksi)
            ->setHeight(280)
            ->setXAxis($dataBulan);
    }
}
