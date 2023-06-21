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
        $produk_ukuran = $request->input('prod_ukuran');

        if(Auth::check()){

            $produk_cek = Produk::where('id',$produk_id)->first();

            if($produk_cek)
            {
                if(Cart::where('prod_id', $produk_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $produk_cek->nama. ' Sudah Ada Di Keranjang']);
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

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('shop.cart.cart', compact('carts'));
    }
    public function updatecart(Request $request){
        $produk_id = $request->input('prod_id');
        $produk_qty = $request->input('prod_qty');

        if(Auth::check()){
            if(Cart::where('prod_id',$produk_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('prod_id',$produk_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $produk_qty;
                $cart->update();
                return response()->json(['status'=>'Jumlah Di Ganti']);
            }
        }
    }

    public function cartcount(){
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }

    public function deletecart(Request $request){


        if(Auth::check())
        {
            $produk_id = $request->input('prod_id');
            if(Cart::where('prod_id', $produk_id)->where('user_id', Auth::id())->exists())
            {
            $cartItem = Cart::where('prod_id', $produk_id)->where('user_id', Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' => "Produk Berhasil Di Hapus Dari Keranjang"]);
            }
        }
        else{
            return response()->json(['status' => "Masuk Untuk Melanjutkan"]);

        }
    }




}
