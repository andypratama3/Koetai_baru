<?php


namespace App\Actions\Tiket;

use App\Models\Tiket;

class DeleteTiketAction
{
    public function execute($slug): void
    {
        $tiket = tiket::where('slug', $slug)->firstOrFail();
        
        $tiket->delete();
    }
}

