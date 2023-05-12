<?php

namespace App\Actions\OrderTiket;

use Str;


use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StoreOrderTiketAction
{
    public function execute(Request $request)
    {
        $order = new OrderTiket;
        $order->user_id = Auth::id();
        $order->nama = $request->nama;
        $order->jumlah = $request->jumlah;
        $order->kategori_tiket = $request->kategori_tiket;

        $order->save();
    }
}
