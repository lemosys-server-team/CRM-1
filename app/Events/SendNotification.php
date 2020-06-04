<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification;
    public $users;
    public $push_data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($notification, $users, $push_data)
    {
        $this->notification = $notification; 
        $this->users = $users; 
        $this->push_data = $push_data;
    }
}
