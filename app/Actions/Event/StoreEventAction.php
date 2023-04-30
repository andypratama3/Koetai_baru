<?php

namespace App\Action\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use Str;

class StoreEventAction
{
    public function execute(Request $request)
    {
        $event = new Event;
        $event->nama = $request->nama;
        $event->tanggal =$request->tanggal;

        if($request->file('foto')){
            $event_picture = $request->file('foto');
            $ext = $event_picture->getClientOriginalExtension();

            $upload_path = 'storage/img/event/';
            $picture_name = "event_". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $event_picture->move($upload_path,$picture_name);
        }
        $event->foto = $picture_name;
        $event->save();
    }
}
