<?php

namespace App\Listeners;

use App\Events\NewFeedback;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Log;

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
        /* $fb = $event->feedback; */
        /* Log::info($fb); */
        $usr = $event->user;
        if ($usr->settings->send_each_fb) 
        
        {
            $data = array('name'=>$usr->name, 'feedback' => $event->feedback,
                'answer'=>$event->answer, 'obj'=>$event->obj);

            Mail::send('emails.newFeedback', $data, function($message) use ($usr)
            {
                $message->to($usr->email, $usr->name)->subject
                    ('Поступил новый отзыв.');
                $message->from('xyz@gmail.com','HLines.ru');
            });
        }

    }
}
