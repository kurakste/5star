<?php

namespace App\Listeners;

use App\Events\NewMoneyIncome;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class NewMoneyIncomeHandler
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
     * @param  NewMoneyIncome  $event
     * @return void
     */
    public function handle(NewMoneyIncome $event)
    {
        //
        $data = $event->data;
        Log::info("I'm in NewMoneyIncomeHandler");
        Log::info($data);
    }
}
