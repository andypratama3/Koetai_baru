<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Actions\Event\StoreEventAction;
use App\Actions\Event\DeleteEventAction;
use App\Actions\Event\UpdateEventAction;
use App\Http\Requests\Event\StoreEventRequest;
use App\Models\Talent;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $limit = 10;
        $events = Event::select(['nama', 'tanggal_mulai','tanggal_selesai', 'slug'])->latest()->paginate($limit);
        $count = $events->count();
        $no = $limit * ($events->currentPage() - 1);

        return view('dashboard.event.index', compact(
            'events',
            'count',
            'no',
        ));
    }
    public function create()
    {
        $talents = Talent::select(['id', 'nama'])->orderBy('nama')->get();

        return view('dashboard.event.create', compact(
            'talents'
        ));
    }
    public function store(StoreEventRequest $request, StoreEventAction $storeEventAction)
    {
        $storeEventAction->execute($request);

        return redirect()->route('dashboard.event.index')->with('success-insert','Event Berhasil Ditambahkan!');
    }
    public function show(Request $request,$slug)
    {

        $event = Event::where('slug',$slug)->select(['id', 'nama','deskripsi' ,'tanggal_mulai','tanggal_selesai','foto', 'slug'])->with('talents')->firstOrFail();

        return view('dashboard.event.show', compact('event'));
    }

    public function edit(Request $request,$slug)
    {
        $event = Event::where('slug',$slug)->select(['id', 'nama','deskripsi' ,'tanggal_mulai','tanggal_selesai','foto', 'slug'])->firstOrFail();
        $talents = Talent::select(['id', 'nama'])->orderBy('nama')->get();

        return view('dashboard.event.edit', compact(
            'event',
            'talents'
        ));
    }
    public function update(StoreEventRequest $request, UpdateEventAction $updateEventAction, $slug)
    {
        $updateEventAction->execute($request,$slug);

        return redirect()->route('dashboard.event.index')->with('success-update','Event Berhasil Di Update!');

    }
    public function destroy($slug, DeleteEventAction $deleteEventAction){

        $deleteEventAction->execute($slug);
        return redirect()->route('dashboard.event.index')->with('success-delete','Event Berhasil Di Hapus!');
    }

}
