<?php


namespace App\Actions\Kategori;

use App\Models\Kategori;
use Illuminate\Http\Request;


class DeleteKategoriAction
{
    public function execute($slug): void
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $kategori->delete();

    }
}
