<?php

namespace App\Actions\Anggota;

use App\Models\Anggota;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UpdateAnggotaAction
{
    public function execute(Request $request, $slug)
    {
        $anggota = Anggota::where('slug',$slug)->firstOrFail();
        $anggota->nama = $request->nama;
        $anggota->devisi = $request->devisi;
        $anggota->instagram = $request->instagram;

        if($request->file('foto')){
            $anggota_picture = $request->file('foto');
            $ext = $anggota_picture->getClientOriginalExtension();

            $upload_path = 'storage/img/anggota/';
            $picture_name = "anggota_". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $anggota_picture->move($upload_path,$picture_name);
        }
        $anggota->foto = $picture_name;
        $anggota->save();
    }
}
