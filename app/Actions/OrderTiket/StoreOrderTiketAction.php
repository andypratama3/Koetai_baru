<?php
namespace App\Actions\OrderTiket;


use Str;
use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreOrderTiketAction
{
    public function execute(Request $request){

        $tikets = Tiket::select(['kategori','harga','stok','slug'])->get();

        $order = new OrderTiket();
        $order->user_id = Auth::id();
        $order->nama = $request->input("nama");
        $order->tiket_id = $request->input("tiket_id");
        $order->jumlah = $request->input("jumlah");
        $order->total = $request->total;
        //mengurangi stok pada tiket

        $order->save();
    }

}
