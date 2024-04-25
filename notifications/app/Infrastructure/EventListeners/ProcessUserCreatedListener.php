<?php

namespace App\Infrastructure\EventListeners;

use App\Domain\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProcessUserCreatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // Process the user data and save it into a log file
        $notification = $event->notification;
        $logData = [
            'message' => $notification->getMessage(),
        ];

        Log::info('User created event processed.', $logData);
    }
}
