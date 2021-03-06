<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\BalanceLessThanCriticalLevel' => [
            'App\Listeners\BalanceLessThanCritical@handle',
        ],
        'App\Events\BalanceZeroLevel' => [
            'App\Listeners\BalanceZeroLevelHandler@handle',
        ],
        'App\Events\NewFeedback' => [
            'App\Listeners\NewFeedbackHandler@handle',
        ],
        'App\Events\NewMoneyIncome' => [
            'App\Listeners\NewMoneyIncomeHandler@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
