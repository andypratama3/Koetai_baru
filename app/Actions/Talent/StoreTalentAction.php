<?php

namespace App\Actions\Talent;

use Str;
use Carbon\Carbon;
use App\Models\Talent;
use Illuminate\Http\Request;

class StoreTalentAction
{
    public function execute(Request $request)
    {
        $talent = new Talent;
        $talent->nama = $request->nama;
        $talent->deskripsi = $request->deskripsi;

        if($request->file('foto')){
            $talent_picture = $request->file('foto');
            $ext = $talent_picture->getClientOriginalExtension();

            $upload_path = 'storage/img/talent/';
            $picture_name = "talent_". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $talent_picture->move($upload_path,$picture_name);
        }

        $talent->foto = $picture_name;
        $talent->save();
    }
}
