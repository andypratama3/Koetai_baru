<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderTiket;
use App\Actions\OrderTiket\StoreOrderTiketAction;

class OrderTiketController extends Controller
{
    public function index(){
        $tikets = Tiket::select(['kategori','harga','stok','slug'])->get();
        return view('order-tiket', compact('tikets'));
    }
    public function store(StoreOrderTiket $request, StoreOrderTiketAction $storeOrderTiketAction)
    {
        $storeOrderTiketAction->execute($request);
        return redirect()->route('index')->with('success','Tiket berhasil Di Pesan');
    }
}
