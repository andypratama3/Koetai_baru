<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Actions\Cart\StoreCartAction;
use App\Http\Requests\StoreCartRequest;

class CartController extends Controller
{
    public function index(){

        $carts = Cart::where('user_id', Auth::id())->get();
        return view('shop.cart', compact('carts'));
    }

    public function addtocart(StoreCartRequest $request)
    {
        // $storeCartAction->execute($request);
        $produk_id = $request->input('produk_id');
        if(Auth::check()){

            $produk_check = Produk::where('id',$produk_id)->first();

            if($produk_check)
            {
                if(Cart::where('produk_id', $produk_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $produk_check->name. ' Already Added To Cart']);
                }else{
                $cart = new Cart();
                $cart->produk_id = $produk_id;
                $cart->user_id = Auth::id();
                $cart->save();
                return response()->json(['status' => $produk_check->name. ' Added To Cart']);
                }
            }
        }else{
            return response()->json(['status' => "Login To continue"]);

        }

        return redirect()->route('cart')->with('success','Produk Succes Add To Cart');
    }
}
