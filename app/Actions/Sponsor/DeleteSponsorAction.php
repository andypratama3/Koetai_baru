<?php

namespace App\Actions\Sponsor;

use App\Models\Sponsor;


class DeleteSponsorAction{
    public function execute($slug): void
    {
        $sponsor = Sponsor::where('slug', $slug)->firstOrFail();
        $sponsor->delete();
    }
}
