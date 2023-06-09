<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Tiket\StoreTiketAction;
use App\Actions\Tiket\DeleteTiketAction;
use App\Actions\Tiket\UpdateTiketAction;
use App\Http\Requests\Tiket\StoreTiketRequest;



class TiketController extends Controller
{
    public function index()
    {
        $no = 0;
        $tikets = Tiket::select(['kategori','harga','stok','slug'])->get();
        return view('dashboard.tiket.index', compact('tikets','no'));
    }
    public function show($slug)
    {
        $tiket = Tiket::where('slug',$slug)->select(['kategori','harga','stok','slug'])->firstOrFail();
        return view('dashboard.tiket.show', compact('tiket'));
    }
    public function create()
    {
        return view('dashboard.tiket.create');
    }
    public function store(StoreTiketRequest $request, StoreTiketAction $StoreTiketAction)
    {
        $StoreTiketAction->execute($request);
        return redirect()->route('dashboard.tiket.index')->with('success-insert','Tiket Berhasil Di Tambah!');
    }
    public function edit($slug)
    {
        $tiket = Tiket::where('slug',$slug)->select(['kategori','harga','stok','slug'])->firstOrFail();
        return view('dashboard.tiket.edit', compact('tiket'));
    }
    public function update(StoreTiketRequest $request, UpdateTiketAction $UpdateTiketAction, $slug)
    {
        $UpdateTiketAction->execute($request,$slug);
        return redirect()->route('dashboard.tiket.index')->with('success-update','Tiket Berhasil Di Update');
    }
    public function destroy(DeleteTiketAction $DeleteTiketAction, $slug)
    {
        $DeleteTiketAction->execute($slug);
        return redirect()->route('dashboard.tiket.index')->with('success-delete','Tiket Berhasil Di Hapus');

    }
}
