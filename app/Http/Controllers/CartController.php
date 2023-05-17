<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Cart\StoreCartAction;
use App\Http\Requests\StoreCartRequest;

class CartController extends Controller
{
    public function index(){
        return view('shop.cart');
    }

    public function store(StoreCartRequest $request, StoreCartAction $storeCartAction)
    {
        $storeCartAction->execute($request);

        return redirect()->route('cart')->with('success','Produk Succes Add To Cart');
    }
}
