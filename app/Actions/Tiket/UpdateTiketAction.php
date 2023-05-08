<?php

namespace App\Actions\Tiket;

use Str;

use App\Models\Tiket;
use Illuminate\Http\Request;

class UpdatetiketAction
{
    public function execute(Request $request,$slug): void
    {
        $tiket = Tiket::where('slug',$slug)->firstOrFail();
        $tiket->kategori = $request->kategori;
        $tiket->harga = $request->harga;
        $tiket->save();
    }
}
