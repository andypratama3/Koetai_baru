<?php

namespace App\Actions\Tiket;

use Str;

use App\Models\Tiket;
use Illuminate\Http\Request;

class StoreTiketAction
{
    public function execute(Request $request)
    {
        $tiket = new Tiket;
        $tiket->kategori = $request->kategori;
        $tiket->harga = $request->harga;
        $tiket->stok = $request->stok;

        if($request->file('foto')){
            $foto_tiket = $request->file('foto');
            $ext = $foto_tiket->getClientOriginalExtension();

            $upload_path = 'storage/img/tiket/';
            $picture_name = "Tiket". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $foto_tiket->move($upload_path,$picture_name);
        }
        $tiket->foto = $picture_name;
        $tiket->save();
    }
}
