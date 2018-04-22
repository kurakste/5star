<?php

namespace App\Listeners;

use App\Events\NewFeedback;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewFeedbackHandler
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
     * @param  NewFeedback  $event
     * @return void
     */
    public function handle(NewFeedback $event)
    {
        //
    }
}
