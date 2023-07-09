<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use App\Models\Produk;
use App\Models\Anggota;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $events = Event::select(['nama', 'foto', 'deskripsi','slug'])->latest()->take(3)->get();
        $produks = Produk::select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->get();
        $anggotas = Anggota::select(['nama', 'foto','devisi','instagram', 'slug'])->get();
        $sponsor = Sponsor::select(['nama','logo','slug'])->limit(1)->get();
        $sponsors = Sponsor::select(['nama','logo','slug'])->latest()->get();

        return view('welcome', compact('events','produks','anggotas','sponsor','sponsors'));
    }
    public function show($slug)
    {
        $event = Event::where('slug',$slug)->with('talents')->firstOrFail();
        $tikets = Tiket::select(['kategori','harga','stok','foto','slug'])->get();
        return view('detail-event', compact('event','tikets'));
    }

}
