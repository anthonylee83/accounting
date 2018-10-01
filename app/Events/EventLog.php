<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
use App\EventType;

class EventLog
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;
    protected $table;
    protected $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, EventType $type, $message)
    {
        $this->user     = $user;
        $this->type     = $type;
        $this->$message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('Event-Logs');
    }
}
