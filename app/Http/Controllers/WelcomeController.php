<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $events = Event::select(['nama', 'tanggal_mulai','tanggal_selesai','foto','deskripsi', 'slug']);
        return view('welcome', compact('events'));
    }
}
