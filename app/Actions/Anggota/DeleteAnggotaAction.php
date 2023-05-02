<?php


namespace App\Actions\Anggota;

use App\Models\Anggota;


class DeleteAnggotaAction
{
    public function execute($slug): void
    {

        $anggota = Anggota::where('slug', $slug)->firstOrFail();
        $anggota->delete();

    }
}

