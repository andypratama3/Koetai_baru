<?php


namespace App\Actions\Kategori;

use App\Models\Kategori;
use Illuminate\Http\Request;


class UpdateKategoriAction
{
    public function execute(Request $request,$slug)
    {
        $kategori = Kategori::where('slug',$slug)->firstOrFail();
        $kategori->nama = $request->nama;
        $kategori->save();
    }
}
