<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Produk;
use App\Models\Anggota;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        $events = Event::select('foto')->latest()->limit(3)->get();
        $produks = Produk::select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->get();
        $anggotas = Anggota::select(['nama', 'foto','devisi','instagram', 'slug'])->get();
        return view('welcome', compact('events','produks','anggotas'));
    }
}
