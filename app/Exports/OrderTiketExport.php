<?php

namespace App\Exports;

use App\Models\OrderTiket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderTiketExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrderTiket::all();
    }

    public function headings(): array{
        return ["Order ID","User_ID","Nama","Tiket","Jumlah","Total","Status","SLug","Tangga Di Buat","Tanggal Di Update"];
    }
}