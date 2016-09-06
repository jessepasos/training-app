<?php

namespace App\Listeners;

use App\Events\UserWasCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignUserToPort
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreatedEvent  $event
     * @return void
     */
    public function handle(UserWasCreatedEvent $event)
    {
        $event->user->port_id = $event->portId;

        $event->user->save();
    }
}
