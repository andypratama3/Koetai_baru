<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function show($slug)
    {
        $event = Event::where('slug',$slug)->with('talents')->firstOrFail();
        $tikets = Tiket::select(['kategori','harga','stok','foto','slug'])->get();
        return view('detail-event', compact('event','tikets'));
    }

    public function about(){

        return view('about');
    }
}
