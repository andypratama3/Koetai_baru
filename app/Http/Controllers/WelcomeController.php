<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        $events = Event::select('foto')->latest()->limit(3)->get();
        return view('welcome', compact('events'));
    }
}
