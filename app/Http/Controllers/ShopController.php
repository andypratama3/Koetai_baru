<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\OrderShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;

class ShopController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::select(['nama'])->get();
        // foreach($kategoris as $kategori)
        $shops = Produk::with('kategoris')->get();
        return view('shop.index', compact('shops','kategoris'));
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
        $carts = Cart::where('user_id',Auth::id())->select(['prod_id','prod_ukuran','prod_qty'])->get();

        return view('shop.cart.checkout',compact('carts'));
    }
    public function proses_checkout(CheckoutRequest $request){


        $metode_pembayaran = $request->input("payment_method");
        $nama_penerima = $request->input("nama_penerima");
        $nomor_telpon = $request->input("nomor_telpon");
        $alamat = $request->input("alamat");
        $catatan = $request->input("catatan");
        $produk_id = $request->input("prod_id");
        $produk_ukuran  = $request->input("prod_ukuran");
        $produk_qty = $request->input("prod_qty");
        $total = $request->input("total");

        $order = new OrderShop;
        $order->user_id = Auth::id();
        $order->nama_penerima = $nama_penerima;
        $order->nomor_telpon = $nomor_telpon;
        $order->alamat = $alamat;
        $order->prod_id = $produk_id;
        $order->prod_qty = $produk_qty;
        $order->prod_ukuran = $produk_ukuran;
        $order->catatan = $catatan;
        $order->metode_pembayaran = $metode_pembayaran;
        $order->total = $total;
        //mengurangin Stok Pada Produk
        $stok = Produk::find($produk_id);
        $stok->stock = $stok->stock - $produk_qty;
        $stok->update();
        $order->save();
        $cartitem = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitem);

        return response()->json(['status'=>'Produk Berhasil Di Pesan']);


    }

    public function bayar(){

        \Midtrans\Config::$serverKey = config('midtrans.server_Key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $orderItem->total,
                // 'jumlah' => $produk_qty,

            ),
            'customer_details' => array(
                // 'nama' => $nama,
                // 'alamat' => $alamat,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('shop.pembayaran');
    }

    //List Order Item Shop
    public function list_order_shop()
    {
        return view('shop.list-order');
    }


}

