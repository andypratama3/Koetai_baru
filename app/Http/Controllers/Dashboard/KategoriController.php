<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Kategori\StoreKategoriAction;
use App\Actions\Kategori\DeleteKategoriAction;
use App\Http\Requests\Kategori\StorekategoriRequest;

class KategoriController extends Controller
{
    public function index(){
        $limit = 15;
        $kategories = Kategori::select(['nama','slug'])->latest()->paginate($limit);
        $count = $kategories->count();
        $no = $limit * ($kategories->currentPage() - 1);
        return view('dashboard.kategori.index', compact('kategories','count','no'));
    }
    public function create(){
        return view('dashboard.kategori.create');
    }
    public function store(StorekategoriRequest $request, StoreKategoriAction $storeKategoriAction)
    {
        $storeKategoriAction->execute($request);
        return redirect()->route('dashboard.kategori.index')->with('succes','Kategori Berhasil Ditambahkan!');
    }
    public function destroy($slug ,DeleteKategoriAction $deleteKategoriAction)
    {
        $deleteKategoriAction->execute($slug);
        return redirect()->route('dashboard.kategori.index')->with('succes','Kategori Berhasil Dihapus!');
    }

}
