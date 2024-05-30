<?php

namespace App\Exports;

use App\Models\Output;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportOutput implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function view(): View
    {
        $data = Output::with([
            'katalog' => function($query){
                $query->select('id', 'title', 'harga');
            },
            'user' => function($query){
                $query->select('id', 'name');
            }
        ])->whereBetween('date', [$this->startDate, $this->endDate])
        ->orderBy('date', 'asc')
        ->get();

        return view('dashboard.output.table', [
            'produkKeluar'=>$data
        ]);
    }
}
