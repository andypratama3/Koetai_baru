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
        return ["id","nama","user_id","tiket_id","email","jumlah","order_id","status","transaction_id","payment_type","payment_code","gross_amount","pdf_url","Tangga Di Buat","Tanggal Di Update"];
    }
}
