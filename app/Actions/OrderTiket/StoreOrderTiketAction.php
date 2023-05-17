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
        $order->user_id = Auth::id();
        $order->nama = $request->nama;
        $order->total = $request->total;
        $order->tiket_id = $request->tiket_id;
        $order->jumlah = $request->jumlah;
        //mengurangi stok pada tiket
        $stok = Tiket::find($request->tiket_id);
        $stok->stok = $stok->stok - $request->jumlah;
        $stok->update();
        $order->save();

    }
}
