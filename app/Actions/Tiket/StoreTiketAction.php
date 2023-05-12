<?php

namespace App\Actions\Tiket;

use Str;

use App\Models\Tiket;
use Illuminate\Http\Request;

class StoreTiketAction
{
    public function execute(Request $request)
    {
        $tiket = new Tiket;
        $tiket->kategori = $request->kategori;
        $tiket->harga = $request->harga;
        $tiket->stok = $request->stok;

        $tiket->save();
    }
}
