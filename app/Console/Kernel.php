<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Logic\BillingMachine;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        Log::info('Hi from scheduler!');
         
        $schedule->call(function () 
            {
                Log::info('hi from every day');

        })->dailyAt('0:00');
        
        $schedule->call(function () 
            {
                Log::info('hi from every week');

        })->weekly()->mondays()->at('23:00');
        
        $schedule->call(function () 
            {
                Log::info('hi from every month.');

        })->monthlyOn(1, '23:00');


    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
