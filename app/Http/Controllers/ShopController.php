<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {

        $produks = Produk::select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->firstOrFail()->get();
        return view('shop.shop', compact('produks'));
    }
    public function show(){

        $produk = Produk::select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->firstOrFail();

        return view('shop.detail', compact('produk'));
    }

   
    public function store(Request $request)
    {
        $produks = Produk::select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->firstOrFail()->get();
        foreach($produks as $produk){
            $produk = new Produk;
            $produk->nama = Auth::name();
            $produk->produk_id = $request->produk_id;
            $produk->jumlah = $request->jumlah;
            $produk->total = $produks->harga * $request->jumlah;
            $produk->alamat = $request->alamat;

            $pro = Produk::select('id', $produks->id)->first();
            $pro->stok = $pro->stok - $request->jumlah;
            $pro->update();
        }
        $produk->save();
        return redirect()->route('shop')->with('success','Produk berhasil Di Pesan');
    }
}
