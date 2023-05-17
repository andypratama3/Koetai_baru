<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderTiket;
use App\Actions\OrderTiket\StoreOrderTiketAction;

class OrderTiketController extends Controller
{
    public function index(){
        $tikets = Tiket::all();
        return view('order-tiket', compact('tikets'));
    }
    public function store(StoreOrderTiket $request, StoreOrderTiketAction $storeOrderTiketAction)
    {
        $storeOrderTiketAction->execute($request);
        return \redirect('list-order-tiket')->with('success','Tiket berhasil Di Pesan');
    }
    public function allorder()
    {
        $no = 0;
        $orders = OrderTiket::with('tiket')->select(['nama','jumlah','tiket_id'])->firstOrFail()->get();

        return view('list-order-tiket', compact('no','orders'));
    }
    public function show_order($slug){

        $order = OrderTiket::where('slug',$slug)->select(['nama','jumlah','harga','kategori_tiket','slug'])->firstOrFail();
        return view('list-order-tiket', compact('order'));
    }
}
