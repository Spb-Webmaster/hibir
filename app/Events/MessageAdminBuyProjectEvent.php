<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageAdminBuyProjectEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $project_id;
    /**
     * Create a new event instance.
     * Создайте новый экземпляр события.
     */
    public function __construct($user_id, $project_id)
    {
        $this->user_id = $user_id;
        $this->project_id = $project_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
