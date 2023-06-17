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

        if ($user->avatar != 'profile.jpg') {
            Storage::disk('profile')->delete('storage/img/profile/original/' . $user->avatar);
            Storage::disk('profile')->delete('storage/img/profile/35x35/' . $user->avatar);
            Storage::disk('profile')->delete('storage/img/profile/150x150/' . $user->avatar);
        }

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
