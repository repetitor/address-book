<?php

namespace App\Events;

use App\Models\Opinion;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOpinion implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(readonly private Opinion $opinion)
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('opinions'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->opinion->id,
            'name' => $this->opinion->name,
            'description' => $this->opinion->description,
        ];
    }
}
