<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\BookHistory;

class RecordBookChange
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event)
    {
        BookHistory::create([
            'livre_id' => $event->book->id,
            'action' => 'updated', // Par exemple, vous pouvez adapter en fonction de l'événement
            'changed_data' => json_encode($event->book->getChanges()),
        ]);
    }
}
