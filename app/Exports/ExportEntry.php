<?php

namespace App\Exports;

use App\Http\Controllers\DashboardEntryController;
use App\Models\Entry;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportEntry implements FromView
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
        $data = Entry::with([
            'katalog' => function($query){
                $query->select('id', 'title');
            },
            'supplier' => function($query){
                $query->select('id', 'perusahaan');
            },
            'user' => function($query){
                $query->select('id', 'name');
            }
        ])->whereBetween('date', [$this->startDate, $this->endDate])
        ->orderBy('date', 'asc')
        ->get();
        $totalQuantity = $data->sum('quantity');
        return view('dashboard.entry.table', [
            'produkMasuk'=>$data,
            'totalAnggrekMasuk'=>$totalQuantity
        ]);
    }
}
