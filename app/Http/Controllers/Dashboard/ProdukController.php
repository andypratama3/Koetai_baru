<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Produk\StoreProdukAction;
use App\Actions\Produk\UpdateProdukAction;
use App\Http\Requests\Produk\StoreProdukRequest;

class ProdukController extends Controller
{
    public function index()
    {
        $limit = 10;
        $produks = Produk::select(['nama','deskripsi','foto','stock','harga'])->paginate($limit);
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
        return redirect()->route('dashboard.produk.index')->with('success','Produk Berhasil Ditambahkan!');
    }
    public function show(Request $request,$slug)
    {
        $produk = Produk::where('slug',$slug)->select(['id', 'nama','deskripsi' ,'foto','harga','stock', 'slug'])->with('kategoris')->firstOrFail();

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
        return redirect()->route('dashboard.produk.index')->with('success','Produk Berhasil Update!');
    }
    public function destroy(DeleteProdukAction $deleteProdukAction,$slug)
    {
        $deleteProdukAction->execute($slug);
        return redirect()->route('dashboard.produk.index')->with('success','Produk Berhasil Hapus!');
    }

}
