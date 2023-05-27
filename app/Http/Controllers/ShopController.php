<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $shops = Produk::all();

        return view('shop.index', compact('shops'));
    }
    

}
