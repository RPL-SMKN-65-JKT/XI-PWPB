<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BorrowEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $scanID;
    private $deadline;
    private $type;
    /**
     * Create a new event instance.
     */
    public function __construct($scanID, $deadline, $type)
    {
        $this->scanID = $scanID;
        $this->deadline = $deadline;
        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('private.borrow.' . $this->scanID),
        ];
    }

    public function broadcastAs(){
        return 'scan';
    }

    public function broadcastWith(){
        return [
            'scanned' => true,
            'deadline' => $this->deadline,
            'type' => $this->type
        ];
    }
}
