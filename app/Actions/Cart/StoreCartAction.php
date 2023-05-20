<?php

namespace App\Actions\Cart;

use Str;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StoreCartAction
{
    public function execute(Request $request,$id)
    {
        $produk = Produk::findOrFail($id);
        

    }
}
