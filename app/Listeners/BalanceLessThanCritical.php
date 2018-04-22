<?php

namespace App\Listeners;
use App\Events\BalanceLessThanCriticalLevel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Mail;

class BalanceLessThanCritical
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
     * @param  BalanceLessThanCriticalLevel  $event
     * @return void
     */
    public function handle(BalanceLessThanCriticalLevel $event)
    {
        //
        $usr = $event->user;
        $dayleft = $usr->balance()/(12*$event->mounthTariff/365);
        $dayleft = round ($dayleft, 0, PHP_ROUND_HALF_DOWN);
        $data = array('name'=>$usr->name, 'dayleft' => $dayleft);
        Mail::send('emails.mailLowBalance', $data, function($message) use ($usr)
        {
            $message->to($usr->email, $usr->name)->subject
            ('Низкий уровень баланса');
            $message->from('xyz@gmail.com','HLines.ru');
        });
    
    }
}
