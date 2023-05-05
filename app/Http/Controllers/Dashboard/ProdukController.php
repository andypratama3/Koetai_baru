<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Produk\StoreProdukAction;
use App\Http\Requests\Produk\StoreProdukRequest;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::select(['']);
        return view('dashboard.produk.index');
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
}
