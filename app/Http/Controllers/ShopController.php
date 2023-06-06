<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;

class ShopController extends Controller
{
    public function index(){

        $shops = Produk::all();

        return view('shop.index', compact('shops'));
    }


    public function addprodukcheckout(Request $request){

        $produk_id = $request->input('prod_id');
        $produk_qty = $request->input('prod_qty');
        $produk_ukuran = $request->input('prod_ukuran');

        if(Auth::check()){

            $produk_cek = Produk::where('id',$produk_id)->first();

            if($produk_cek)
            {
                if(Cart::where('prod_id', $produk_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => 'Produk Berhasil Di Tambahkaan']);
                }else{
                $cartItem = new Cart();
                $cartItem->prod_id = $produk_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $produk_qty;
                $cartItem->prod_ukuran = $produk_ukuran;
                $cartItem->save();
                return response()->json(['status' => $produk_cek->nama. ' Di Tambahkan Ke Keranjang']);
                }
            }
        }else{
            return redirect()->route('login')->json(['status','Silahkan Login Terlebih Dahulul']);
        }
    }

    public function checkoutproduk(Request $request)
    {
        $carts = Cart::where('user_id',Auth::id())->select(['prod_id','prod_ukuran','prod_qty'])->firstOrFail()->get();
        $produk_id = $request->input("produk_id");
        $produk_ukuran  = $request->input("produk_ukuran");
        $produk_qty = $request->input("produk_jumlah");
        

        return view('shop.cart.checkout',compact('carts'));

    }
}
