<?php


namespace App\Actions\Produk;

use App\Models\Produk;


class DeleteProdukAction
{
    public function execute($slug): void
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();
        $produk->delete();

        $produk->kategoris()->detach();

    }
}

