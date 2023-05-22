<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
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
        return view('tiket.order-tiket', compact('tikets'));
    }
    public function store(StoreOrderTiket $request, StoreOrderTiketAction $storeOrderTiketAction)
    {
        $storeOrderTiketAction->execute($request);

        return \redirect('list-order-tiket')->with('success','Tiket berhasil Di Pesan');
    }
    
     


}
