<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feedback;
use DB;

class Object extends Model
{
    public function countOfFeedbacks() {
    // Возвращает кол-во отзывов по объекту.

        return Feedback::where('object_id',$this->id)->count();
    }

    public function avrgOffAllAnswer () {
        // Возвращает средний бал по всем ответам на все вопосы.

        $out = DB::table('answers')
                ->join ('feedbacks','answers.feedback_id','=','feedbacks.id')
                ->select ('answers.*')
                ->where ('feedbacks.object_id','=',$this->id)
                ->avg('answer');

    return $out;
    }


    public function getFeedBackList () {
    
        $out = Feedback::where('object_id',$this->id)->get();
        //$query ='';
        //$out['avr_answer'] = '';
        return $out;
    }
    //
}
