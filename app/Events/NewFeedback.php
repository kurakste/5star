<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewFeedback
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $feedback;
    public $answer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $feedback, $answer)
    {
        $this->user = $user;
        $this->feedback = $feedback;
        $this->answer = $answer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
