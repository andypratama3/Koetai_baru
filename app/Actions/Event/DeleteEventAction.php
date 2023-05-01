<?php


namespace App\Actions\Event;

use App\Models\Event;


class DeleteEventAction
{
    public function execute($slug): void
    {

        $event = Event::where('slug', $slug)->firstOrFail();
        $event->delete();

    }
}

