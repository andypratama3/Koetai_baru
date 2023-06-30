<?php

namespace App\Actions\Produk;

use Str;
use App\Models\Produk;
use App\Models\Kategoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateProdukAction
{
    public function execute(Request $request,$slug)
    {
        $produk = Produk::where('slug',$slug)->firstOrFail();
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

        $produk->kategoris()->sync($request->kategori);
    }
}
