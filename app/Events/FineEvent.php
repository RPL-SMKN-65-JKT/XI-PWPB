<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FineEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $scanID,$telat,$denda;

    /**
     * Create a new event instance.
     */
    public function __construct($scanID, $telat, $denda)
    {
        $this->scanID = $scanID;
        $this->telat = $telat;
        $this->denda = $denda;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('private.fine.' . $this->scanID),
        ];
    }

    public function broadcastAs(){
        return 'fine';
    }

    public function broadcastWith(){
        return [
            'telat' => $this->telat,
            'denda' => $this->denda
        ];
    }
}
