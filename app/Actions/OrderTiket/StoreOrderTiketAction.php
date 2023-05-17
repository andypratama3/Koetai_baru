<?php

namespace App\Actions\OrderTiket;

use Str;


use App\Models\User;
use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreOrderTiketAction
{
    public function execute(Request $request)
    {
        $tikets = Tiket::select(['kategori','harga','stok','slug'])->get();

        $order = new OrderTiket();
        $order->nama = $request->nama;
        // $order->tiket_id = $request->input('tiket_id');
        $order->jumlah = $request->jumlah;

        $stok = Tiket::find($request->tiket_id);
        $stok->stok = $stok->stok - $request->jumlah;
        $stok->update();
        $order->update();

    }
}
