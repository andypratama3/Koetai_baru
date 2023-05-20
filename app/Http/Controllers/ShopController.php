<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('shop.shop', compact('produks'));
    }
    public function show($slug){

        $produk = Produk::where('slug',$slug)->select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->firstOrFail();

        return view('shop.detail', compact('produk'));
    }


    public function store(Request $request)
    {
       


        $produk->save();
        return redirect()->route('shop')->with('success','Produk berhasil Di Pesan');
    }
}
