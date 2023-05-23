<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        $produk_id = $request->input('prod_id');
        $produk_qty = $request->input('prod_qty');

        if(Auth::check()){

            $produk_cek = Produk::where('id',$produk_id)->first();

            if($produk_cek)
            {
                if(Cart::where('prod_id', $produk_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $produk_cek->name. ' Sudah Ada Di Keranjang']);
                }else{
                $cartItem = new Cart();
                $cartItem->prod_id = $produk_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $produk_qty;
                $cartItem->save();
                return response()->json(['status' => $produk_cek->name. ' Di Tambahkan Ke Keranjang']);
                }
            }
        }else{
            return \redirect('login')->response()->json(['status' => "Login To continue"]);
        }
    }

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('shop.cart', compact('cart'));
    }

}
