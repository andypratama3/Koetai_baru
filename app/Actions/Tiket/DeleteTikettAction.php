<?php


namespace App\Actions\Tiket;

use App\Models\Tiket;

class DeleteTiketAction
{
    public function execute($slug): void
    {
        $talent = Talent::where('slug', $slug)->firstOrFail();
        $talent->delete();
    }
}

