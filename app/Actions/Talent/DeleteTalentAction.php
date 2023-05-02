<?php


namespace App\Actions\Talent;

use App\Models\Talent;

class DeleteTalentAction
{
    public function execute($slug): void
    {
        $talent = Talent::where('slug', $slug)->firstOrFail();
        $talent->delete();
    }
}

