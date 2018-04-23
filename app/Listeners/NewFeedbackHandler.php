<?php

namespace App\Listeners;

use App\Events\NewFeedback;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Log;
use App\Question;

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
        $usr = $event->user;
        if ($usr->settings->send_each_fb) 
        {
            $questions = Question::where('oobject_id', $event->obj->id)->get();
            $q = [];
            foreach ($questions as $quest) 
            {
                $q[$quest->id] = $quest->question;
            }
//            Log::info($event->answer);
        
            $data = array('name'=>$usr->name, 'feedback' => $event->feedback,
                'answers'=>$event->answer, 'obj'=>$event->obj, 'questions'=>$q);

            Mail::send('emails.newFeedback', $data, function($message) use ($usr)
            {
                $message->to($usr->email, $usr->name)->subject
                    ('Поступил новый отзыв.');
                $message->from('xyz@gmail.com','HLines.ru');
            });
        }

    }
}
