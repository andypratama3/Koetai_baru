<?php

namespace App\Actions\Sponsor;


use Illuminate\Http\Request;
use App\Models\Sponsor;
use Str;

class StoreSponsorAction
{
    public function execute(Request $request)
    {
        $sponsor = new Sponsor;
        $sponsor->nama = $request->nama;

        if($request->file('logo')){
            $logo = $request->file('logo');
            $ext = $logo->getClientOriginalExtension();

            $upload_path = 'storage/img/sponsor/';
            $picture_name = "sponsor_". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $logo->move($upload_path,$picture_name);
        }
        $sponsor->logo = $picture_name;
        $sponsor->save();
    }
}
