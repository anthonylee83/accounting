<?php

namespace App\Listeners;

use App\Events\EventLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  EventLog  $event
     * @return void
     */
    public function handle(EventLog $event)
    {
        Event::create([
            'user_id'       => $event->user->id,
            'event_type_id' => $event->type->id,
        ]);
    }
}
