<?php

namespace App\Actions\Anggota;

use App\Models\Anggota;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StoreAnggotaAction
{
    public function execute(Request $request)
    {
        $anggota = new Anggota();
        $anggota->nama = $request->nama;
        $anggota->devisi = $request->devisi;
        $anggota->instagram = $request->instagram;

        if($request->file('foto')){
            $anggota_picture = $request->file('foto');
            $ext = $anggota_picture->getClientOriginalExtension();

            $upload_path = 'storage/img/anggota/';
            $picture_name = "event_". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $anggota_picture->move($upload_path,$picture_name);
        }
        $anggota->foto = $picture_name;
        $anggota->save();
    }
}
