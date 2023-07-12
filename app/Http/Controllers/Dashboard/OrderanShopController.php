<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\OrderShop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderanShopController extends Controller
{
    public function index()
    {
        $ordersShop = OrderShop::select(["nama_penerima","nomor_telpon","prod_id","prod_qty","prod_ukuran",
        "kategori_pesanan","alamat","status","created_at","updated_at"])->get();
        return view('dashboard.orderan_shop.orderan', compact('ordersShop'));
    }


    public function show(){
        return view('dashboard.orderan_shop.show');
    }
}
