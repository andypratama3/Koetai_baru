<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Anggota\StoreAnggotaAction;
use App\Actions\Anggota\DeleteAnggotaAction;
use App\Actions\Anggota\UpdateAnggotaAction;
use App\Http\Requests\Anggota\StoreRequestAnggota;



class AnggotaController extends Controller
{
    public function index(){
        $no = 0;
        $anggotas = Anggota::all();
        return view('dashboard.anggota.index', compact('anggotas','no'));
    }
    public function create()
    {
        return view('dashboard.anggota.create');
    }
    public function store(StoreRequestAnggota $request, StoreAnggotaAction $storeAnggotaAction)
    {
        $storeAnggotaAction->execute($request);
        return redirect()->route('dashboard.anggota.index')->with('success-insert','Anggota berhasil di tambahkan!');
    }
    public function show($slug){

        $anggota = Anggota::where('slug',$slug)->select(['nama','foto' ,'devisi','instagram','slug'])->firstOrFail();
        return view('dashboard.anggota.show', compact('anggota'));
    }
    public function edit(Request $request,$slug)
    {
        $anggota = Anggota::where('slug',$slug)->select(['nama','foto' ,'devisi','instagram','slug'])->firstOrFail();

        return view('dashboard.anggota.edit', compact('anggota'));
    }
    public function update(StoreRequestanggota $request, UpdateAnggotaAction $updateAnggotaAction,$slug){
        $updateAnggotaAction->execute($request,$slug);
        return redirect()->route('dashboard.anggota.index')->with('success-update','Anggota berhasil di Update!');
    }
    public function destroy(DeleteAnggotaAction $deleteAnggotaAction,$slug)
    {
        $deleteAnggotaAction->execute($slug);
        return redirect()->route('dashboard.anggota.index')->with('success-delete','Anggota berhasil di Hapus!');
    }
}
