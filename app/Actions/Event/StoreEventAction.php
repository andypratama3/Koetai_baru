<?php

namespace App\Actions\Event;

use Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Talent;

class StoreEventAction
{
    public function execute(Request $request)
    {
        $event = new Event;
        $event->nama = $request->nama;
        $event->deskripsi = $request->deskripsi;

        $tanggal = explode(' - ', $request->tanggal);
        $tanggal_mulai = Carbon::parse($tanggal[0])->format('Y-m-d H:i:s');
        $tanggal_selesai = Carbon::parse($tanggal[1])->format('Y-m-d H:i:s');

        $event->tanggal_mulai = $tanggal_mulai;
        $event->tanggal_selesai = $tanggal_selesai;

        if($request->file('foto')){
            $event_picture = $request->file('foto');
            $ext = $event_picture->getClientOriginalExtension();

            $upload_path = 'storage/img/event/';
            $picture_name = "event_". Str::slug($request->nama). "_" .date("YmdHis") . ".$ext";
            $event_picture->move($upload_path,$picture_name);
        }
        $event->foto = $picture_name;
        $event->save();

        foreach ($request->talent as $key => $talent) {
            $event->talents()->attach($talent);
        }
    }
}
