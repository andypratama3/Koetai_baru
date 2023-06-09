<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Produk\DeleteProdukAction;
use App\Actions\Produk\StoreProdukAction;
use App\Actions\Produk\UpdateProdukAction;
use App\Http\Requests\Produk\StoreProdukRequest;

class ProdukController extends Controller
{
    public function index()
    {
        $limit = 10;
        // $produks = Produk::select(['id','nama','deskripsi','foto','stock','harga'])->paginate($limit);
        $produks = Produk::select(['nama', 'foto','stock','harga','deskripsi', 'slug'])->latest()->paginate($limit);
        $count = $produks->count();
        $no = $limit * ($produks->currentPage() - 1);
        return view('dashboard.produk.index', compact('produks','count','no'));
    }
    public function create()
    {
        $kategoris =  Kategori::select(['id','nama'])->orderBy('nama')->get();
        return view('dashboard.produk.create', compact('kategoris'));
    }
    public function store(StoreProdukRequest $request, StoreProdukAction $storeProdukAction)
    {
        $storeProdukAction->execute($request);
        return redirect()->route('dashboard.produk.index')->with('success-insert','Produk Berhasil Ditambahkan!');
    }

    public function show($slug)
    {
        $produk = Produk::where('slug',$slug)->select(['nama','deskripsi' ,'foto','harga','stock', 'slug'])->firstOrFail();
        // dd($produk);
        return view('dashboard.produk.show', compact('produk'));
    }
    public function edit($slug)
    {
        $produk = Produk::where('slug',$slug)->select(['id', 'nama','deskripsi' ,'foto','harga','stock', 'slug'])->firstOrFail();
        $kategoris = Kategoris::select(['id', 'nama'])->orderBy('nama')->get();
        return view('dashboard.produk.edit', compact('produk','kategoris'));
    }
    public function update(StoreProdukRequest $request, UpdateProdukAction $updateProdukAction, $slug)
    {
        $updateProdukAction->execute($request,$slug);
        return redirect()->route('dashboard.produk.index')->with('success-update','Produk Berhasil Update!');
    }
    public function destroy(DeleteProdukAction $deleteProdukAction,$slug)
    {
        $deleteProdukAction->execute($slug);
        return redirect()->route('dashboard.produk.index')->with('success-delete','Produk Berhasil Hapus!');
    }

}
