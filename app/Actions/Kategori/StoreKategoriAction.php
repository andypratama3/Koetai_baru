<?php


namespace App\Actions\Kategori;

use App\Models\Kategori;
use Illuminate\Http\Request;


class StoreKategoriAction
{
    public function execute(Request $request)
    {
        $kategori = new Kategori;
        $kategori->nama = $request->nama;
        $kategori->save();
    }
}
