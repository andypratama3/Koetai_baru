<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $limit = 15;
        $events = Event::select(['nama', 'tanggal', 'slug'])->latest()->paginate($limit);
        $count = $events->count();
        $no = $limit * ($events->currentPage() - 1);

        return view('dashboard.event.index', compact(
            'events',
            'count',
            'no'
        ));
    }
    public function create()
    {
        return view('dashboard.event.create');
    }

}
