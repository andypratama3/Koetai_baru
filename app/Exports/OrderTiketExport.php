<?php

namespace App\Exports;

use App\Models\OrderTiket;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderTiketExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrderTiket::all();
    }
}
