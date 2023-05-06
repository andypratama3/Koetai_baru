<?php

namespace App\Actions\Produk;

use Str;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategoris;

class UpdateProdukAction
{
    public function execute(Request $request)
    {
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->stock = $request->stock;
        $produk->harga = $request->harga;

        if($request->file('foto')){
            $produk_picture = $request->file('foto');
            $ext = $produk_picture->getClientOriginalExtension();

            $upload_path = 'storage/img/produk/';
            $picture_name = "Produk_". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $produk_picture->move($upload_path,$picture_name);
        }
        $produk->foto = $picture_name;
        $produk->save();

        foreach ($request->kategori as $key => $kategori) {
            $produk->kategoris()->attach($kategori);
        }
    }
}
