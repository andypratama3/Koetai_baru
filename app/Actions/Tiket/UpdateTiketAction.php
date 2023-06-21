<?php

namespace App\Actions\Tiket;

use Str;

use App\Models\Tiket;
use Illuminate\Http\Request;

class UpdatetiketAction
{
    public function execute(Request $request,$slug): void
    {
        $tiket = Tiket::where('slug',$slug)->firstOrFail();
        $tiket->kategori = $request->kategori;
        $tiket->harga = $request->harga;
        $tiket->stok = $request->stok;
        if($request->file('foto')){
            $produk_picture = $request->file('foto');
            $ext = $produk_picture->getClientOriginalExtension();

            $upload_path = 'storage/img/tiket/';
            $picture_name = "Tiket". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $produk_picture->move($upload_path,$picture_name);
        }
        $tiket->save();
    }
}
