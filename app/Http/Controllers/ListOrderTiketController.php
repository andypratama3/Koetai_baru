<?php

namespace App\Http\Controllers;

use App\Models\OrderTiket;
use Illuminate\Http\Request;

class ListOrderTiketController extends Controller
{
    public function index()
    {
        $no = 0;
        $orders = OrderTiket::with('tiket')->select(['nama','jumlah','tiket_id','slug'])->firstOrFail()->get();

        return view('list-order-tiket', compact('no','orders'));
    }
    public function show($slug){

        $order = OrderTiket::where('slug', $slug)->firstOrFail()->get();

        return view('list-order-tiket', compact('order'));
    }
    public function destroy($id){
        $order = OrderTiket::where('id', $id)->firstOrFail();
        $order->delete();
        return redirect()->route('list.index');
    }

}
