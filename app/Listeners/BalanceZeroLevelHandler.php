<?php

namespace App\Listeners;

use App\Events\BalanceZeroLevel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class BalanceZeroLevelHandler
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
     * @param  BalanceZerroLevel  $event
     * @return void
     */
    public function handle(BalanceZeroLevel $event)
    {
        //
        $usr = $event->user;
        $data = array('name'=>$usr->name);
        Mail::send('emails.zeroBalance', $data, function($message) use ($usr)
        {
            $message->to($usr->email, $usr->name)->subject
            (' Нулевой баланс по счету');
            $message->from('xyz@gmail.com','HLines.ru');
        });
    }
}
