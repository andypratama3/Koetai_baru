<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

class ShopController extends Controller
{
    public function index(){

        $shops = Produk::all();

        return view('shop.index', compact('shops'));
    }

    public function store(CheckoutRequest $request){

        
    }
}
