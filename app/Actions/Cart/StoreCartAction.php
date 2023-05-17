<?php

namespace App\Actions\Cart;

use Str;

use Illuminate\Http\Request;
use App\Models\Cart;


class StoreCartAction
{
    public function execute(Request $request)
    {
        $produk = Produk::select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->firstOrFail();
        $cart = new Cart;
        $cart->user_id = Auth::id();
        $cart->produk_id = $produk->produk_id;

        $cart->save();
    }
}
