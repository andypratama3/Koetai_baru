<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tiket\StoreTiketRequest;
use App\Actions\Tiket\StoreTiketAction;
use App\Actions\Tiket\DeleteTiketAction;



class TiketController extends Controller
{
    public function index()
    {
        $no = 0;
        $tikets = Tiket::select(['kategori','harga','slug'])->get();
        return view('dashboard.tiket.index', compact('tikets','no'));
    }
    public function show($slug)
    {
        $tiket = Tiket::where('slug',$slug)->select(['kategori','harga','slug'])->firstOrFail();
        return view('dashboard.tiket.show', compact('tiket'));
    }
    public function create()
    {
        return view('dashboard.tiket.create');
    }
    public function store(StoreTiketRequest $request, StoreTiketAction $StoreTiketAction)
    {
        $StoreTiketAction->execute($request);
        return redirect()->route('dashboard.tiket.index')->with('succes','Tiket Berhasil Di Tambah!');
    }
    public function edit($slug)
    {
        $tiket = Tiket::where('slug',$slug)->select(['kategori','harga','slug'])->firstOrFail();
        return view('dashboard.tiket.show', compact('tiket'));
    }
    public function update(StoreTiketRequest $request, StoreTiketAction $StoreTiketAction, $slug)
    {

        $UpdateTiketAction->execute($request,$slug);
        return redirect()->route('dashboard.tiket.index')->with('succes','Tiket Berhasil Di Update');
    }
    public function destroy(DeleteTiketAction $DeleteTiketAction, $slug)
    {
        $DeleteTiketAction->execute($slug);
        return redirect()->route('dashboard.tiket.index')->with('succes','Tiket Berhasil Di Hapus');

    }
}
